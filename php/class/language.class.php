<?php

class Language extends Icon
{

    private $translationSystem;

    protected $db;

    protected $languageCurrent;

    protected $translation;

    protected function __construct($db, $languageCurrent){

        $this->db = $db;

        $this->default($languageCurrent);

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
            array('name' => ':languageCurrent', 'value' => $this->languageCurrent, 'type' => 'string')
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
            array('name' => ':languageCurrent', 'value' => $this->languageCurrent, 'type' => 'string')
        );

        $this->db->bind($parameter);

        return $this->db->run('all');

    }

    private function default($languageCurrent) {

        if($languageCurrent) {

            $this->languageCurrent = $languageCurrent;

        }else{

            $sql = 'select system_name
                from im_language
                where status like "on"
                and status_default like "on"';

            $this->db->prepare($sql);

            $languageCurrent = $this->db->run('one');

            if ($languageCurrent) {

                $this->languageCurrent = $languageCurrent->system_name;

            } else {

                var_dump('No default language set (or default is not enable)');

                exit();

            }

        }

    }

    //Add mark to elements on the body
    protected function translationMark($mark, $data) {

        return '<section class="translation '.$mark.'">'.$data.'</section>';

    }

    protected function getLanguage() {

        $sql = 'select name, system_name, url
                from im_language
                where status like "on"
                order by position';

        $this->db->prepare($sql);

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

        return $this->translation;

    }

}