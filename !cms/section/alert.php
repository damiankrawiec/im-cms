<?php
//Alert top default set to not display (to show success - 1 or fail - 0, init $alert0 or $alert1 variable)
//Message top information (fail, success)
if(isset($alert1))
    echo $addition->alert1($alert1, $icon['message']['success']);

if(isset($alert0))
    echo $addition->alert0($alert0, $icon['message']['fail']);