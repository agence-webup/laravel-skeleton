<?php

return [
    'modules' => [
        'contact' => [
            "enabled" => false,
        ],
        'setting' => [
            "enabled" => false,
        ],
        'redirection' => [
            "enabled" => true,
            'removeparts' => [
                'http://',
                'https://',
                'https://www.pierimport.fr',
                'http://www.pierimport.fr',
                'https://pier-import.demo4.webup.io',
                'http://pier-import.demo4.webup.io',
                'https://157.230.23.195',
                'http://157.230.23.195',
                'pier-import.demo4.webup.io',
                '157.230.23.195',
                'www.pierimport.fr',
                'pierimport.fr',
                config("app.url"),
                str_replace('http://', "", config("app.url")),
                str_replace('http://', "", config("app.url")),
            ]
        ],
    ]
];
