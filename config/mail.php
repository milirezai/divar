<?php
use System\Config\Env;
return 
[

    /*
    |--------------------------------------------------------------------------
    | Email configuration
    |--------------------------------------------------------------------------
    |
    |
    |
    */
    'SMTP' => [
        'Host'       => 'smtp.mailtrap.io',
        'SMTPAuth'   => true,
        'Username'   => '33',
        'Password'   => '22',
        'Port'       => 587,
        'setFrom'    => [
            'mail'  =>  'support@amlak.com',
            'name'  =>  'test'
        ]
    ]

];