<?php
/**
 * Supply the basis for the navbar as an array.
 */
return [
    // Use for styling the menu
    // "wrapper" => null,
    // "class" => "my-navbar rm-default rm-desktop",

    // Here comes the menu items
    "items" => [
        [
            "navbar" => "home",
            "text" => "Hem",
            "url" => "",
            "icon" => "icon-home"
        ],
        [
            "navbar" => "report",
            "text" => "Redovisning",
            "url" => "report",
            "icon" => "icon-leaf",
            "submenu" => [
                "items" => [
                    [
                        "text" => "KMOM01",
                        "url" => "report/kmom01",
                    ],
                    [
                        "text" => "KMOM02",
                        "url" => "report/kmom02",
                    ],
                ],
            ],
        ],
    ],
];
