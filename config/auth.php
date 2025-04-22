<?php

return [

    /*
    |-------------------------------------------------------------------------- 
    | Authentication Defaults
    |-------------------------------------------------------------------------- 
    | 
    | This option controls the default authentication "guard" and password
    | reset options for your application. You may change these defaults
    | as required, but they're a perfect start for most applications.
    |
    */

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

    /*
    |-------------------------------------------------------------------------- 
    | Authentication Guards
    |-------------------------------------------------------------------------- 
    | 
    | Next, you may define every authentication guard for your application. 
    | 
    */

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
    ],

    /*
    |-------------------------------------------------------------------------- 
    | User Providers
    |-------------------------------------------------------------------------- 
    | 
    | All authentication drivers have a user provider. 
    | 
    */

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],
    ],

    /*
    |-------------------------------------------------------------------------- 
    | Resetting Passwords
    |-------------------------------------------------------------------------- 
    |
    | You may specify multiple password reset configurations if you have more
    | than one user table or model in the application and you want to have
    | separate password reset settings based on the specific user types.
    |
    */

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    /*
    |-------------------------------------------------------------------------- 
    | Redirects after Login 
    |-------------------------------------------------------------------------- 
    | 
    | Configure where to redirect users after login based on their role.
    |
    */

    'redirects' => [
        'admin' => '/admin/dashboard', // Redirect to admin dashboard
        'user' => '/',  // Redirect to user homepage
    ],

    /*
    |-------------------------------------------------------------------------- 
    | Password Confirmation Timeout
    |-------------------------------------------------------------------------- 
    |
    | Here you may define the amount of seconds before a password confirmation
    | times out and the user is prompted to re-enter their password via the
    | confirmation screen. 
    |
    */

    'password_timeout' => 10800,

];