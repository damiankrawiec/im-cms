<?php
$varUrlArray = explode(',', $varUrl);

$passwordUrl = $varUrlArray[1];

$sql = 'select email from im_user where password_url like :url';

$this->db->prepare($sql);

$parameter = array(
    array('name' => ':url', 'value' => $passwordUrl, 'type' => 'string')
);

$this->db->bind($parameter);

$userUrl = $this->db->run('one');

if($userUrl) {

    echo '<h4>' . $this->makeTranslationSystem('set-password') . '</h4>';
    echo '<input type="hidden" class="im-destination" value="'.$userUrl->email.'">';
    echo '<input type="button" class="btn btn-danger im-password" value="'.$this->makeTranslationSystem('set-password').'">';
    echo '<input type="hidden" class="im-name" value="'.$this->makeTranslationSystem('new-password-set').'">';
    echo '<input type="hidden" class="im-source" value="'.$this->domain.'">';
    echo '<div class="im-content im-hide" id="'.$passwordUrl.'">'.$this->makeTranslationSystem('new-password-set').'</div>';
    echo '<input type="hidden" class="hide-form">';

}else echo $this->makeTranslationSystem('no-data');