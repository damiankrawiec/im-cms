<?php

class Language extends Icon
{

    private $translationSystem;

    protected $db;

    protected $currentLanguage;

    protected $defaultLanguage;

    protected $translation;

    protected $translationSource;

    protected function __construct($db, $currentLanguage, $defaultLanguage){

        $this->db = $db;

        $this->currentLanguage = $currentLanguage;

        $this->defaultLanguage = $defaultLanguage;

        $this->translationSystem();

        $this->translation();

    }

    private function translationSystem() {

        $translationSystem = $this->getTranslationSystem();

        $translationSystemArray = array();

        if ($translationSystem) {

            foreach ($translationSystem as $ts) {

                $translationSystemArray[$ts['system_name']] = $ts['content'];

            }

        }

        $this->translationSystem = $translationSystemArray;

    }

    private function translation() {

        $translation = $this->getTranslation();

        $translationArray = array();

        if ($translation) {

            foreach ($translation as $t) {

                $translationArray[$t['target_table'] . '-' . $t['target_column'] . '-' . $t['target_record']] = $t['content'];

            }

        }

        $this->translation = $translationArray;

    }

    private function getTranslationSystem() {

        $sql = 'select ts.system_name, ts.content
                from im_translation_system ts
                join im_language l on(l.language_id = ts.language_id)
                where l.system_name = :languageCurrent';

        $this->db->prepare($sql);

        $parameter = array(
            array('name' => ':languageCurrent', 'value' => $this->currentLanguage, 'type' => 'string')
        );

        $this->db->bind($parameter);

        return $this->db->run('all');

    }

    private function getTranslation() {

        $sql = 'select t.target_table as target_table, t.target_column as target_column, t.target_record, t.content as content
                from im_translation t
                join im_language l on(l.language_id = t.language_id)
                where l.system_name = :languageCurrent';

        $this->db->prepare($sql);

        $parameter = array(
            array('name' => ':languageCurrent', 'value' => $this->currentLanguage, 'type' => 'string')
        );

        $this->db->bind($parameter);

        return $this->db->run('all');

    }

    protected function getTranslationSource($systemName, $addition) {

        $translationSourcePath = $systemName.'/content/language/'.$this->currentLanguage.'.php';

        $return = false;
        if($addition->fileExists($translationSourcePath))
            $return = require $translationSourcePath;

        return $return;

    }

    //Add mark to elements on the body
    protected function translationMark($mark, $data) {

        $dataDisplay = $data;
        if(isset($this->translation[$mark]))
            $dataDisplay = $this->translation[$mark];

        return $dataDisplay;

    }

    //Translation url - e.g. use in change language box
    protected function translationUrl($systemName) {

        $sql = 'select t.content as url
                from im_translation t 
                join im_language l on(l.language_id = t.language_id)
                where t.target_table like :table
                and t.target_column like :column
                and l.system_name = :name';

        $this->db->prepare($sql);

        $parameter = array(
            array('name' => ':table', 'value' => 'im_section', 'type' => 'string'),
            array('name' => ':column', 'value' => 'name_url', 'type' => 'string'),
            array('name' => ':name', 'value' => $systemName, 'type' => 'string')
        );

        $this->db->bind($parameter);

        $return = false;
        if($section = $this->db->run('one'))
            $return = $section->url;

        return $return;

    }

    protected function getLanguage() {

        $sql = 'select name, system_name, url
                from im_language
                where status like :status
                order by position';

        $this->db->prepare($sql);

        $parameter = array(
            array('name' => ':status', 'value' => 'on', 'type' => 'string')
        );

        $this->db->bind($parameter);

        return $this->db->run('all');

    }

    protected function makeTranslationSystem($name) {

        if(isset($this->translationSystem[$name])) {

            return $this->translationSystem[$name];

        }else{

            return '';

        }

    }

    public function getCurrentTranslation() {

        return array('system' => $this->translationSystem, 'data' => $this->translation);

    }

}