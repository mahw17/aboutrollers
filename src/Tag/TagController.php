<?php

namespace Mahw17\Tag;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;
// use Mahw17\User\HTMLForm\UserLoginForm;
// use Mahw17\User\HTMLForm\CreateUserForm;
// use Mahw17\User\HTMLForm\UpdateUserForm;

// use Anax\Route\Exception\ForbiddenException;
// use Anax\Route\Exception\NotFoundException;
// use Anax\Route\Exception\InternalErrorException;

/**
 * A sample controller to show how a controller class can be implemented.
 */
class TagController implements ContainerInjectableInterface
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
        $this->session->set('navbar', 'tags');
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
        $db = $this->di->get("dbqb");

        // Collect data
        $tag = new Tag();
        $tag->setDb($this->di->get("dbqb"));

        $data = [
            "title"         => "Taggar",
            "navbar"        => 'tags',
            "intro_mount"   => 'Taggar',
            "intro_path"    => 'Visa',
            "tags"          => $tag->getTagsDetails()
        ];

        // Add and render views
        $page->add("mahw17/intro/subintro", $data, "subintro");
        $page->add("mahw17/tag/default", $data, "main");

        return $page->render($data);
    }
}
