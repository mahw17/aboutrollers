<?php

namespace Mahw17\User;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

/**
 * Controller to handle user login.
 */
class UserController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;

    /**
     * @var array $layout to hold a special login layout.
     */
    private $layout = [
        "region" => "layout",
        "template" => "mahw17/layout/login",
        "data" => [
            "favicon" => "assets/lib/ico/favicon.ico",
            "javascripts" => []
            ]
        ];

    /**
     * Display the about page.
     *
     * @return object
     */
    public function loginActionGet() : object
    {
        $data = [
            "title"  => "Login | ramverk1",
            "layout" => "mahw17/layout/login",
            "navbar" => 'login'
        ];

        $page = $this->di->get("page");
        $page->addLayout($this->layout, $data, "layout");
        $page->add("mahw17/users/login", $data);

        return $page->render($data);
    }

    /**
     * User verification.
     *
     */
    public function loginActionPost()
    {
        // Load framework services
        $request    = $this->di->get("request");
        $response   = $this->di->get("response");

        // Get username and password
        $user     = $request->getPost('user', null);
        $password = $request->getPost('password', null);

        // Verify user
        $userIdentification = new User();
        $userIdentification->setDI($this->di);
        $userIdentification->getUsers();
        $success  = $userIdentification->loginUser($user, $password);

        // Redirect
        if ($success === true) {
            $response->redirect("");
            return true;
        } else {
            $response->redirect("user/login");
            return false;
        }
    }

    /**
     * Logout process page.
     */
    public function logoutActionGet()
    {
        // Load framework services
        $response   = $this->di->get("response");

        // User logout
        $userIdentification = new User();
        $userIdentification->setDI($this->di);
        $userIdentification->logoutUser();

        // Redirect
        $response->redirect("");
        return true;
    }
}
