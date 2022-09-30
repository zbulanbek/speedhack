<?php

return [
    'merchant_id' => 538996,
    'secret_key' => 'Uy8LXTmupG83TJna',
    'merchant_secret_payout' => 'EfP1vSGzE04kcvf6',
    'routes' => [
        'payments' => env('PAYBOX_GATEWAY_URL', 'https://api.paybox.money/v4/payments'),
    ],
    'currency' => env('PAYBOX_CURRENCY', 'KZT'),
    'check_url' => env('PAYBOX_CHECK_URL', "https://speedhack.kz/paybox/check"),
    'cancel_url' => env('PAYBOX_CANCEL_URL', "https://speedhack.kz/paybox/cancel"),
    'result_url' => env('PAYBOX_RESULT_URL', "https://speedhack.kz/paybox/result"),
    'success_url' => env('PAYBOX_SUCCESS_URL', "https://speedhack.kz/paybox/success"),
    'failure_url' => env('PAYBOX_FAILURE_URL', "https://speedhack.kz/paybox/failure"),
    'back_url' => env('PAYBOX_BACK_URL', "https://speedhack.kz/paybox/back"),
];
