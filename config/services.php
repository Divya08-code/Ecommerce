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

    'google' => [
        'client_id' => '446980861214-2gptp2dcdpjjh8qc43h3e55eul662plc.apps.googleusercontent.com',
        'client_secret' => 'FklXnyBlRgGObciStOpAraEF',
        'redirect' => 'http://localhost:8000/auth/google/callback',
    ],


    'facebook' => [
        'client_id' => '298482285067856',
        'client_secret' => '412c36dccda93693499fc2dbe5627770',
        'redirect' => 'http://localhost:8000/auth/facebook/callback',
    ],

];
