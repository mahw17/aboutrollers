<?php
/**
 * Load the user controller.
 */
return [

    "routes" => [
        [
            "info" => "Validate User.",
            "mount" => "user",
            "handler" => "\Mahw17\User\UserController",
        ]
    ]
];
