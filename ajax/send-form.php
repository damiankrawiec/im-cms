<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once '../php/script/post.php';

if($p_sendForm and $p_sendForm['captcha'] == $p_sendForm['captchaText']) {

    require_once '../app/composer/vendor/autoload.php'; // Autoload files using Composer autoload

    $mailer = new PHPMailer(true);

    $from = array('name' => 'Internet.Media', 'address' => 'poczta@internet.media.pl');

    try {
        //Server settings
        $mailer->SMTPDebug = SMTP::DEBUG_SERVER;
        $mailer->isSMTP();
        $mailer->Host = 's94.linuxpl.com';
        $mailer->SMTPAuth = true;
        $mailer->Username = $from['address'];
        $mailer->Password = 'B2#h3[cO43~O@2~';
        $mailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mailer->Port = 25;

        //Recipients
        $mailer->setFrom($from['address'], $from['name']);
        $mailer->addAddress($p_sendForm['destination'], $p_sendForm['destination']);

        // Content
        $mailer->isHTML(true);
        $mailer->Subject = $p_sendForm['name'];
        $mailer->Body = $p_sendForm['source'].': '.$p_sendForm['content'];

        $mailer->send();

    } catch (Exception $e) {

        echo $mailer->ErrorInfo;

    }

    require_once '../'.$p_sendForm['system'].'/setting.php';

    require_once '../php/class/database.class.php';

    $db = new Database();

    $sql = 'insert into im_form (name, email_source, email_destination, content) values(:name, :source, :destination, :content)';

    $db->prepare($sql);

    $parameter = array(
        array('name' => ':name', 'value' => $p_sendForm['name'], 'type' => 'string'),
        array('name' => ':source', 'value' => $p_sendForm['source'], 'type' => 'string'),
        array('name' => ':destination', 'value' => $p_sendForm['destination'], 'type' => 'string'),
        array('name' => ':content', 'value' => $p_sendForm['content'], 'type' => 'string')
    );

    $db->bind($parameter);

    $db->run();

}

exit();