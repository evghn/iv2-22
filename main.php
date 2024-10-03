<?php

require "core/autoload.php";


$data = [    
    'version' => 'v1.0',
    'height' => 1800,
    'width' => 800,    
    'deep' => 1500,
    'ip' => 60,
    'weight' => 200,
    'cashVolume' => 1000000,
    'key' => false,
];

$atm = new ATM($data);
// echo $atm->getInfo(true);
// var_dump($atm->getParam('company', false));

// var_dump($atm->getInfo());
$atm2 = new ATMv2([
    ...$data, 
    'giveCash'  => true,
    'display' => 'LED',
    'NFC' => true,
    'version' => 'v2.0'
]);

// echo $atm2->getInfo(true);
// var_dump($atm2->getParam('version', false));

// var_dump($atm2->getInfo());
// echo $atm2->companyInfo();

$card = new Card([    
    'owner' => 'student',
    'expire' => '12/30',    
    'typeCard' => 'МИР',
    'bank' => '💵',
]);

echo $card->getInfo(true);

