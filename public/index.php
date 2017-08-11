<?php

require dirname(__DIR__) . '/vendor/autoload.php';

$available = [
    'Accept' => [
        'text/hal+json' => 'hal-app',
        'application/json' => 'app',
        'cli' => 'cli-hal-app'
    ],
    'Accept-Language' => [
        'ja' => 'ja',
        'en-US' => 'en'
    ]
];
$accept = new \BEAR\Accept\Accept($available);
list($context, $vary) = $accept($_SERVER);

require dirname(__DIR__) . '/bootstrap/bootstrap.php';
