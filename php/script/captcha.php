<?php

//Captcha generator

$image = imagecreatetruecolor(200, 50);

$white = imagecolorallocate($image, 255, 255, 255);

imagefilledrectangle($image, 0, 0, 200, 50, $white);

$line = imagecolorallocate($image, 150, 150, 150);

for($i = 0;$i < 4;$i++)
    imageline($image, 0, rand()%50, 200, rand()%50, $line);

$pixel = imagecolorallocate($image, 50, 50, 50);

for($i = 0;$i < 400; $i++)
    imagesetpixel($image, rand()%200, rand()%50, $pixel);

$letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

$length = strlen($letters);

$text = imagecolorallocate($image, 0, 0, 0);

$string = '';
for ($i = 0;$i < 7; $i++) {

    $letter = $letters[rand(0, $length - 1)];

    imagestring($image, 5,  5+($i * 30), 20, $letter, $text);

    $string .= $letter;

}

$imageStamp = md5(microtime());

imagepng($image, $captchaData['system'].'/public/captcha/'.$imageStamp.'.png');

imagedestroy($image);

$captcha = $string;