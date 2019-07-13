<?php


class Language
{

    private $languageCurrent;

    public function __construct(){

        $this->languageCurrent = false;

    }
    private function getTranslationSystem($db) {

        $sql = 'select ts.system_name, ts.content
                from im_translation_system ts
                join im_language l on(l.language_id = ts.language_id)
                where l.system_name = :languageCurrent';

        $db->prepare($sql);

        $parameter = array(
            array('name' => ':languageCurrent', 'value' => $this->languageCurrent, 'type' => 'string')
        );

        $db->bind($parameter);

        return $db->run('all');

    }

    private function getTranslation($db) {

        $sql = 'select t.target_table as target_table, t.target_column as target_column, t.target_record, t.content as content
                from im_translation t
                join im_language l on(l.language_id = t.language_id)
                where l.system_name = :languageCurrent';

        $db->prepare($sql);

        $parameter = array(
            array('name' => ':languageCurrent', 'value' => $this->languageCurrent, 'type' => 'string')
        );

        $db->bind($parameter);

        return $db->run('all');

    }

    public function default($db, $session) {

        if($session) {

            $this->languageCurrent = $session;

        }else{

            $sql = 'select system_name
                from im_language
                where status like "on"
                and status_default like "on"';

            $db->prepare($sql);

            $languageCurrent = $db->run('one');

            if ($languageCurrent) {

                $this->languageCurrent = $languageCurrent->system_name;

            } else {

                var_dump('No default language set (or default is not enable)');

                exit();

            }

        }

    }
    public function display($db, $systemName) {

        $sql = 'select name, system_name, url
                from im_language
                where status like "on"
                order by position';

        $db->prepare($sql);

        $language = $db->run('all');

        echo '<ul id="change-language">';

        foreach ($language as $l) {

            $active = '';
            if($l['system_name'] == $this->languageCurrent)
                $active = ' class="im-active"';

            echo '<li id="'.$l['system_name'].'"><a href="#" title="'.$l['name'].'"'.$active.'><img src="'.$systemName.'/public/'.$l['url'].'" alt="'.$l['name'].'"></a></li>';

        }

        echo '</ul>';

    }

    public function translationSystem($db) {

        $translationSystem = $this->getTranslationSystem($db);

        $translationSystemArray = array();

        if ($translationSystem) {

            foreach ($translationSystem as $ts) {

                $translationSystemArray[$ts['system_name']] = $ts['content'];

            }

        }

        return $translationSystemArray;

    }

    public function translation($db) {

        $translation = $this->getTranslation($db);

        $translationArray = array();

        if ($translation) {

            foreach ($translation as $t) {

                $translationArray[$t['target_table'] . '-' . $t['target_column'] . '-' . $t['target_record']] = $t['content'];

            }

        }

        return $translationArray;

    }

}