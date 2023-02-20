<?php

return [
    'click2login' => [
        'title' => '单点登录',

        'status' => [
            'info'        => '登录令牌状态: ',
            'vaild'       => '有效',
            'expire-date' => '(将于 :date  过期)',
            'unavailable' => '(但在您的设备上不可用, 请刷新令牌)',
            'expired'     => '失效(已过期)',
            'invaild'     => '无',
        ],

        'actions' => [
            'login'   => '一键登录',
            'unlogin' => '撤销登录令牌',
            'renew'   => '刷新令牌',
        ],

        'info'=> '通过单点登录, 您可以通过此处登录代替游戏内输入密码<br>登录令牌将在您登录此网站的设备上可用',

        'success'   => '令牌已申请，请重新进入服务器',
        'exist'     => '令牌生效中，无需申请',
        'cancelled' => '令牌已撤销',

    ],
];
