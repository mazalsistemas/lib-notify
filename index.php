<?php

require __DIR__.'/lib_ext/autoload.php';

use Notification\Email;



$notification = new Email();
$notification->sendEmail('Assunto de teste','<p>este e um email de <b>teste</b></p>','','Dev Team','','');

var_dump($notification);