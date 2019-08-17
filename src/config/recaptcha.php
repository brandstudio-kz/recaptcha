<?php

return [

    //
    'enabled'        => env('BS_RECAPTCHA_ENABLED', true),

    //
    'middleware_name'   => 'recaptcha',

    //
    'url'               => 'https://www.google.com/recaptcha/api.js?render=',

    //
    'public_key'        => env('BS_RECAPTCHA_PUBLIC', ''),

    //
    'verification_url'  => 'https://www.google.com/recaptcha/api/siteverify',

    //
    'private_key'       => env('BS_RECAPTCHA_PRIVATE', ''),
];
