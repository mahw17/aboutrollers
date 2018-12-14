<?php

namespace Mahw17\User;

use Anax\DI\DIFactoryConfig;
use PHPUnit\Framework\TestCase;

/**
 * Test the User class.
 */
class UserTest extends TestCase
{
    // Create the di container.
    protected $di;

    // Create user object
    protected $user;


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

        // Setup the user class
        $user = new User();
        $user->setDI($this->di);
        $user->getUsers();
        $this->user = $user;
    }

    /**
     * Test the login procedure (incl multiple methods).
     */
    public function testLoginUser()
    {

        // Verify user
        $success  = $this->user->loginUser("admin", "admin");

        // Assertion
        $this->assertTrue($success);
    }

    /**
     * Test the get current user procedure
     */
    public function testGetLoginUser()
    {
        // Get current user
        $this->user->loginUser("admin", "admin");
        $res = $this->user->getLoggedInUser();

        $this->assertEquals($res['user'], "admin");
    }

    /**
     * Test the get current user procedure, none available
     */
    public function testGetLoginUserFalse()
    {
        // Logout if any user and then try to fetch user logged in
        $this->user->logoutUser();
        $res = $this->user->getLoggedInUser();

        $this->assertFalse($res);
    }

    /**
     * Test the logout procedure
     */
    public function testLogoutUser()
    {
        // Log out user
        $success = $this->user->logoutUser();
        $this->assertTrue($success);
    }
}
