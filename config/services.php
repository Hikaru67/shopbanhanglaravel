<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'facebook' => [
        'client_id' => '1085564921899611', //client face của bạn
        'client_secret' => 'afe66a4e58411efdc172d7d5363d9f19', //client app service face của bạn
        'redirect' => 'http://127.0.0.1:8000/admin/callback' //callback trả về
    ],
    'google' => [
        'client_id' => '456662950122-ucbmtnqdouhhc7ls7h28t6guka19n9m6.apps.googleusercontent.com',
        'client_secret' => '-0Vmv1IxeeuLraqTVEyyMu_N',
        'redirect' => 'http://http://127.0.0.1:8000/google/callback'
    ],

];
