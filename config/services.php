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
        'scheme' => 'https',
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
        'client_id' => '980609210851648',
        'client_secret' => '5f73e588aba12f5df62b6ef0d023c258',
        'redirect' => 'https://vuminhtrung.com/projectshopqlbhlaravel/admin/callback'
    ],
    'google' => [
        'client_id' => '787673573013-pokqbgud4ne7l2t1h5mriribhkmjdq5e.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'https://vuminhtrung.com/projectshopqlbhlaravel/google/callback'
    ],
];
