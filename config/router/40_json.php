<?php
/**
 * Load the sample json controller.
 */
return [
    // Path where to mount the routes, is added to each route path.
    // "mount" => "json",

    "routes" => [
        [
            "info" => "IP-validation API",
            "mount" => "json",
            "handler" => "\Anax\Controller\JsonController",
        ]
    ]
];
