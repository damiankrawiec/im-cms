<?php
$passwordUrl = $this->addition->transaction();

echo '<h4>' . $this->makeTranslationSystem('system-address') . '</h4>';
echo '<input type="text" class="form-control im-destination" placeholder="'.$this->makeTranslationSystem('email').'">';
echo '<input type="text" class="form-control im-captcha-text" placeholder="'.$this->makeTranslationSystem('captcha-text').'">';
echo '<img src="'.$this->path.$this->systemName.'/content/public/captcha/'.$imageStamp.'.png'.'" style="width:auto">';
echo '<input type="button" class="btn btn-secondary im-password-address" value="'.$this->makeTranslationSystem('send').'">';

echo '<input type="hidden" class="im-name" value="'.$this->makeTranslationSystem('new-password').'">';
echo '<input type="hidden" class="im-source" value="'.$this->domain.'">';
echo '<div class="im-content im-hide" id="'.$passwordUrl.'">'.$this->makeTranslationSystem('new-password-address').': <a href="http://'.$this->domain.'/'.$currentSectionUrl.','.$passwordUrl.'">'.$this->domain.'/'.$currentSectionUrl.'</a></div>';
echo '<div class="im-hide im-captcha">'.$captcha.'</div>';
echo '<a href="'.$currentSectionUrl.'" class="btn btn-light">' . $this->makeTranslationSystem('back') . '</a>';
echo '<input type="hidden" class="hide-form">';