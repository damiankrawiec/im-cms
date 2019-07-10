<?php


class Language
{

    private $languageDefault;

    public function __construct(){

        $this->languageDefault = false;

    }
    private function getTranslation($db) {

        $sql = 'select ts.system_name, ts.content
                from im_translation_system ts
                join im_language l on(l.language_id = ts.language_id)
                where l.system_name = :languageDefault';

        $db->prepare($sql);

        $parameter = array(
            array('name' => ':languageDefault', 'value' => $this->languageDefault, 'type' => 'string')
        );

        $db->bind($parameter);

        return $db->run('all');

    }

    public function default($db, $session) {

        if($session) {

            $this->languageDefault = $session;

        }else{

            $sql = 'select system_name
                from im_language
                where status like "on"
                and status_default like "on"';

            $db->prepare($sql);

            $languageDefault = $db->run('one');

            if ($languageDefault) {

                $this->languageDefault = $languageDefault->system_name;

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
            if($l['system_name'] == $this->languageDefault)
                $active = ' class="im-active"';

            echo '<li id="'.$l['system_name'].'"><a href="#" title="'.$l['name'].'"'.$active.'><img src="'.$systemName.'/public/'.$l['url'].'" alt="'.$l['name'].'"></a></li>';

        }

        echo '</ul>';

    }

    public function translation_system($db) {

        $translation = $this->getTranslation($db);

        $translationArray = array();

        if($translation) {

            foreach ($translation as $t) {

                $translationArray[$t['system_name']] = $t['content'];

            }

        }

        return $translationArray;

    }

}