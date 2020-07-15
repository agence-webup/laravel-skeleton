<?php

return [
    "title" => "Administration",
    // "favicon" => asset("test"),

    "main_title" => "Administration",

    "menu" => [
        "Dashboard" => [
            "current_route" => "admin.home",
            "icon" => "home",
            "url" => 'admin.home',
        ],
        "Test2" => [
            "current_route" => "admin.home",
            "icon" => "home",
            "links" => [
                "Link 1 " => "admin.home",
                "Link 2 " => "admin.home"
            ],
        ],
    ],

    "shortcuts" => [
        [
            "Voir la dernière facture" => "admin.home",
            "Voir la première facture" => "admin.home"
        ],
        [
            "Voir la liste des clients" => "admin.home",
            "Ajouter un client" => "admin.home"
        ]
    ],

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
                config("app.url"),
                str_replace('http://', "", config("app.url")),
                str_replace('http://', "", config("app.url")),
            ]
        ],
    ]
];
