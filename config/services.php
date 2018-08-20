<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => env('SES_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'facebook' => [
        'client_id' => '286422042166640',
        'client_secret' => '35e5a9ac38c6676743761d41557af7f4',
        'redirect' => 'https://live.ecube-entertainment.com/callback/facebook',
    ],

    'google' => [
        'client_id' => '865802541169-88duqlufeblb93pda2618tp3q6pb7h73.apps.googleusercontent.com',
        'client_secret' => '-4aS8_pq2nh6gvNJ5yH_KcrY',
        'redirect' => 'http://live.ecube-entertainment.com/callback'
    ],

];
