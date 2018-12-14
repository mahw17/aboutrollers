<?php

namespace Mahw17\User;

use Anax\DI\DIFactoryConfig;
use PHPUnit\Framework\TestCase;

/**
 * Test the UserController.
 */
class UserControllerTest extends TestCase
{

    // Create the di and userController container.
    protected $di;
    protected $controller;

    /**
     * Prepare before each test.
     */
    protected function setUp()
    {
        global $di;

        // Setup di
        $this->di = new DIFactoryConfig();
        $this->di->loadServices(ANAX_INSTALL_PATH . "/config/di");

        // View helpers uses the global $di so it needs its value
        $di = $this->di;

        // Setup the controller
        $this->controller = new UserController();
        $this->controller->setDI($this->di);
    }


    /**
     * Test the route "LoginGet".
     */
    public function testLoginActionGet()
    {
        // Do the test and assert it
        $res = $this->controller->loginActionGet();
        $this->assertContains("Login | ramverk1", $res->getBody());
    }

    /**
     * Test the route "LoginPost".
     */
    public function testLoginActionPost()
    {

        // Do the test and assert it
        $array = [
            "post" => [
                "user" => "admin",
                "password" => "admin"
            ]
        ];
        $this->di->get("request")->setGlobals($array);
        $res = $this->controller->loginActionPost();
        $this->assertTrue($res);
    }

    /**
     * Test the route "LoginPost with not ok user details".
     */
    public function testLoginActionPostFalse()
    {

        // Do the test and assert it
        $array = [
            "post" => [
                "user" => "not_exists",
                "password" => "not_exists"
            ]
        ];
        $this->di->get("request")->setGlobals($array);
        $res = $this->controller->loginActionPost();
        $this->assertFalse($res);
    }

    /**
     * Test the route "Logout".
     */
    public function testLogoutAction()
    {

        $res = $this->controller->logoutActionGet();
        $this->assertTrue($res);
    }
}
