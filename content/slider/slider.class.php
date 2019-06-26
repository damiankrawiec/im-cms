<?php


class SliderContent {

    private $systemName;

    private $db;

    public function __construct($systemName, $db) {

        $this->systemName = $systemName;

        $this->db = $db;

    }

    public function display() {

        $sql = 'select name, content, url, link
                from im_slider
                where status like "on"
                order by position';

        $this->db->prepare($sql);

        $slider = $this->db->run('all');

        if($slider) {

            echo '
            <div class="row">
                <div class="col-12">
                    <ul class="pgwSlider">';

                    foreach ($slider as $s) {

                        echo '<li>';

                            if($s['link'] != '')
                                echo '<a href="'.$s['link'].'" target="_blank">';

                                echo '<img src="'.$this->systemName.'/public/'.$s['url'].'" alt="'.$s['name'].'" data-description="'.$s['content'].'">';
                                echo '<span>'.$s['name'].'</span>';

                            if($s['link'] != '')
                                echo '</a>';

                        echo '</li>';

                    }

                echo '</ul>
                </div>    
            </div>';

        }

    }

}