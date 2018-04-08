<?php
return [
    'timeout' => 5.0,

    'default' => [
        'strategy' => \Overtrue\EasySms\Strategies\OrderStrategy::class,
        'gateways' => [
            'Tencent',
        ],
    ],
    'gateways' => [
        'errorlog' => [
            'file' => '/tmp/easy-sms.log',
        ],
        'Tencent' => [
            'api_key' => env('SMS_API_KEY'),
        ],
    ],
];
