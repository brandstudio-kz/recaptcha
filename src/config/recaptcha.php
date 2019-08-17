<?php

return [
    
    /**
     * Enable/Disable reCAPTCHA
     */
    'enabled'           => env('BS_RECAPTCHA_ENABLED', true),

    /**
     * Middleware alias
     */
    'middleware_name'   => 'recaptcha',

    /**
     * Frontend integration
     */
    'url'               => 'https://www.google.com/recaptcha/api.js?render=',

    /**
     * Your sitekey
     */
    'public_key'        => env('BS_RECAPTCHA_PUBLIC', ''),

    /**
     * Response verification
     */
    'verification_url'  => 'https://www.google.com/recaptcha/api/siteverify',

    /**
     * Your secret key
     */
    'private_key'       => env('BS_RECAPTCHA_PRIVATE', ''),

];
