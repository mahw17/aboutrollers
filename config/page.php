<?php
/**
 * Configuration file for page which can create and put together web pages
 * from a collection of views. Through configuration you can add the
 * standard parts of the page, such as header, navbar, footer, stylesheets,
 * javascripts and more.
 */
return [
    // This layout view is the base for rendering the page, it decides on where
    // all the other views are rendered.
    "layout" => [
        "region" => "layout",
        "template" => "mahw17/layout/default",
        "data" => [
            "baseTitle" => " | ramverk1",
            "bodyClass" => null,
            "favicon" => "assets/lib/ico/favicon.ico",
            "logo" => "assets/lib/img/logo.png",
            "htmlClass" => null,
            "lang" => "sv",
            "touchicons" => [
                [
                    "size" => "144x144",
                    "href" => "assets/lib/ico/apple-touch-icon-144-precomposed.png"
                ],
                [
                    "size" => "114x114",
                    "href" => "assets/lib/ico/apple-touch-icon-114-precomposed.png"
                ],
                [
                    "size" => "72x72",
                    "href" => "assets/lib/ico/apple-touch-icon-72-precomposed.png"
                ],
                [
                    "size" => null,
                    "href" => "assets/lib/ico/apple-touch-icon-57-precomposed.png"
                ]
            ],
            "stylesheets" => [
                "assets/lib/css/bootstrap.css",
                "assets/lib/css/bootstrap-responsive.css",
                "assets/lib/css/prettyPhoto.css",
                "assets/lib/js/google-code-prettify/prettify.css",
                "assets/lib/css/flexslider.css",
                "assets/lib/css/style.css",
                "assets/lib/color/default.css",
                "https://fonts.googleapis.com/css?family=Droid+Serif:400,600,400italic|Open+Sans:400,600,700"
            ],
            "javascripts" => [
                "assets/lib/js/jquery.js",
                "assets/lib/js/raphael-min.js",
                "assets/lib/js/jquery.easing.1.3.js",
                "assets/lib/js/google-code-prettify/prettify.js",
                "assets/lib/js/jquery.elastislide.js",
                "assets/lib/js/jquery.prettyPhoto.js",
                "assets/lib/js/jquery.flexslider.js",
                "assets/lib/js/jquery-hover-effect.js",
                "assets/lib/js/bootstrap.js",
                "assets/lib/js/animate.js",

                // Template Custom JavaScript File
                "assets/lib/js/custom.js",
            ],
        ],
    ],

    // These views are always loaded into the collection of views.
    "views" => [
        [
            "region" => "navbar",
            "template" => "mahw17/navbar/navbar",
            "data" => [],
        ],
        [
            "region" => "footer",
            "template" => "mahw17/footer/footer",
            "data" => [],
        ]
    ]
];
