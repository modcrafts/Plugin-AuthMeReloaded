<?php

return [
    'click2login' => [
        'title' => 'Click to Login',

        'status' => [
            'info'        => 'Session: ',
            'vaild'       => 'Vaild',
            'expire-date' => '(Expire on :date)',
            'unavailable' => '(But unavailable on your device, try refresh the Session)',
            'expired'     => 'InVaild(Expired)',
            'invaild'     => 'None',
        ],

        'actions' => [
            'login'   => 'Login',
            'unlogin' => 'Cancel Session',
            'renew'   => 'Refresh Session',
        ],

        'info'=> 'With Click to Login, you can login here instead of entering your password in-game<br>The login session will be available on the device you log into this site',

        'success'   => 'Session created!',
        'exist'     => 'Session is valid, no application required',
        'cancelled' => 'Session Cancelled',

    ],
];
