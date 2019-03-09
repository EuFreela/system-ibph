<?php

return array(
    "driver" => "smtp",
    //"host" => "smtp.mailtrap.io",
    //"host" => 'mail.ibph.com.br',
    "host" => "smtp.gmail.com",
    //"port" => 2525,
    //"port" => 465,
    "port" => "587",
    "from" => array(
        "address" => "sistema@ibph.com.br",
        "name" => "Sistemas IBPH"
    ),
    'encryption' => 'tls',
    "username" => "ibph.sistemas@gmail.com",
    "password" => "##Senha765##",
    "sendmail" => "/usr/sbin/sendmail -bs",
    "pretend" => false
);