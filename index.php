<?php

require  __DIR__ . "/lib_ext/autoload.php";


use Notification\Email;


$novoEmail = new \Notification\Email();
$novoEmail->sendMail("Assunto de teste", "<p>Esse ´um e-mail <b> teste</b>!</p>", "gustavo@gustavoweb.me", "Gustavo Web",  "leowebc@gmail.com.br", "Leonardo");

var_dump($novoEmail);