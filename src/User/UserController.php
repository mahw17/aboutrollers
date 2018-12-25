<?php

namespace Mahw17\User;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;
use Mahw17\User\HTMLForm\UserLoginForm;
use Mahw17\User\HTMLForm\CreateUserForm;
use Mahw17\User\HTMLForm\UpdateUserForm;

// use Anax\Route\Exception\ForbiddenException;
// use Anax\Route\Exception\NotFoundException;
// use Anax\Route\Exception\InternalErrorException;

/**
 * A sample controller to show how a controller class can be implemented.
 */
class UserController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;

    private $session;

    // /**
    //  * The initialize method is optional and will always be called before the
    //  * target method/action. This is a convienient method where you could
    //  * setup internal properties that are commonly used by several methods.
    //  *
    //  * @return void
    //  */
    public function initialize() : void
    {
        // Set navbar active
        $this->session = $this->di->get("session");
        $this->session->set('navbar', 'user');
    }


    /**
     * Description.
     *
     *
     * @throws Exception
     *
     * @return object as a response object
     */
    public function indexActionGet() : object
    {
        // Load framework services
        $page = $this->di->get("page");

        // Collect data
        $user = new User();
        $user->setDb($this->di->get("dbqb"));

        $data = [
            "title"         => "Användare | Startsida",
            "navbar"        => 'user',
            "intro_mount"   => 'Användare',
            "intro_path"    => 'Visa samtliga',
            "items"         => $user->findAll()
        ];

        // Add and render views
        $page->add("mahw17/intro/subintro", $data, "subintro");
        $page->add("mahw17/user/crud/view-all", $data, "main");

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
    public function logoutActionGet()
    {
        // Load framework services
        $session    = $this->di->get("session");
        $response   = $this->di->get("response");

        // User logout
        $session->delete("user");


        // Redirect
        $response->redirect("");
        return true;
    }


    /**
     * Handler with form to update an item.
     *
     * @param int $id the id to update.
     *
     * @return object as a response object
     */
    public function updateAction(int $id) : object
    {
        // Load framework services
        $session    = $this->di->get("session");
        $page       = $this->di->get("page");
        $response   = $this->di->get("response");


        // Verify $id is the same as sessionId
        $user = new User();
        if(!$user->verifyUser($id, $session->get("user"))) {
            // $response->redirect("");
            $page->add("anax/v2/article/default", [
                "content" => "Ajabaja! Du kan bara uppdatera ditt egna konto! Försök inte!",
            ]);

            return $page->render([
                "title" => "Felmeddelande",
            ]);
        }

        // Collect data
        $form = new UpdateUserForm($this->di, $id);
        $form->check();

        $data = [
            "title"         => "Användare | Uppdatera",
            "navbar"        => 'user',
            "intro_mount"   => 'Användare',
            "intro_path"    => 'Uppdatera',
            "form" => $form->getHTML()
        ];

        // Add and render views
        $page->add("mahw17/intro/subintro", $data, "subintro");
        $page->add("mahw17/user/crud/update", $data, "main");

        return $page->render($data);
    }

    /**
     * View specific question
     *
     * @param int $id the question id to view.
     *
     * @return object as a response object
     */
    public function viewAction(int $id) : object
    {
        // Load framework services
        $page = $this->di->get("page");
        $dbqb = $this->di->get("dbqb");

        $user = new User();
        $user->setDb($dbqb);
        $user->find("id", $id);

        // Collect data
        // $form = new UpdateForm($this->di, $id);
        // $form->check();

        $data = [
            "title"         => "Frågor",
            "navbar"        => 'question',
            "intro_mount"   => 'Frågor',
            "intro_path"    => 'Visa',
            "user"          => $user
        ];

        // Add and render views
        $page->add("mahw17/intro/subintro", $data, "subintro");
        $page->add("mahw17/user/default", $data, "main");

        return $page->render($data);
    }
}
