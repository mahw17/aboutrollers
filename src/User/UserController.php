<?php

namespace Mahw17\User;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;
use Mahw17\User\HTMLForm\UserLoginForm;
use Mahw17\User\HTMLForm\CreateUserForm;

// use Anax\Route\Exception\ForbiddenException;
// use Anax\Route\Exception\NotFoundException;
// use Anax\Route\Exception\InternalErrorException;

/**
 * A sample controller to show how a controller class can be implemented.
 */
class UserController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;

    /**
     * Description.
     *
     * @param datatype $variable Description
     *
     * @throws Exception
     *
     * @return object as a response object
     */
    public function indexActionGet() : object
    {
        // Set navbar active
        $session = $this->di->get("session");
        $session->set('navbar', 'user');

        // Load framework services
        $page = $this->di->get("page");

        // Collect data
        $data = [
            "title"         => "Användare | Startsida",
            "navbar"        => 'user',
            "intro_mount"   => 'Användare',
            "intro_path"    => 'Startsida',
            "content" => "An index page",
        ];

        // Add and render views
        $page->add("mahw17/intro/subintro", $data, "subintro");
        $page->add("anax/v2/article/default", $data, "main");

        return $page->render($data);
    }



    /**
     * Description.
     *
     * @param datatype $variable Description
     *
     * @throws Exception
     *
     * @return object as a response object
     */
    public function loginAction() : object
    {
        // Set navbar active
        $session = $this->di->get("session");
        $session->set('navbar', 'user');

        // Load framework services
        $page = $this->di->get("page");

        // Create new form and validate
        $form = new UserLoginForm($this->di);
        $form->check();

        // Collect data
        $data = [
            "title"         => "Användare | Logga in",
            "navbar"        => 'user',
            "intro_mount"   => 'Användare',
            "intro_path"    => 'Logga in',
            "content" => $form->getHTML(),
        ];

        // Add and render views
        $page->add("mahw17/intro/subintro", $data, "subintro");
        $page->add("anax/v2/article/default", $data, "main");

        return $page->render($data);
    }



    /**
     * Description.
     *
     * @param datatype $variable Description
     *
     * @throws Exception
     *
     * @return object as a response object
     */
    public function createAction() : object
    {
        // Set navbar active
        $session = $this->di->get("session");
        $session->set('navbar', 'user');

        // Load framework services
        $page = $this->di->get("page");

        // Create new form and validate
        $form = new CreateUserForm($this->di);

        if ($form->check()) {
            // If user added successfully redirect to login page
            $this->di->get("response")->redirect("user/login");
        }

        // Collect data
        $data = [
            "title"         => "Användare | Skapa konto",
            "navbar"        => 'user',
            "intro_mount"   => 'Användare',
            "intro_path"    => 'Skapa konto',
            "content" => $form->getHTML(),
        ];

        // Add and render views
        $page->add("mahw17/intro/subintro", $data, "subintro");
        $page->add("anax/v2/article/default", $data, "main");

        return $page->render($data);
    }

    /**
     * Logout process page.
     */
    public function logoutAction() : object
    {
        // Load framework services
        $response   = $this->di->get("response");
        $session    = $this->di->get("session");

        // User logout
        $session->delete("user");

        // Redirect
        $response->redirect("");
    }
}
