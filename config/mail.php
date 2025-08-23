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
        'Host'       => 'smtp.gmail.com',
        'SMTPAuth'   => true,
        'Username'   => 'monarchframework@gmail.com',
        'Password'   => 'wkbk vlkz qowx rqpe',
        'Port'       => 587,
        'setFrom'    => [
            'mail'  =>  'monarchframework@gmail.com',
            'name'  =>  'Monarch'
        ]
    ]
];