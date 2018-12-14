<?php

namespace Mahw17\Controller;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

/**
 * Controller to hanle the About request
 * lets the user choose the stylesheet to use.
 */
class HomeController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;

    /**
     * Display the about page.
     *
     * @return object to render
     */
    public function indexActionGet() : object
    {
        // Set navbar active
        $session = $this->di->get("session");
        $session->set('navbar', 'home');

        $data = [
            "title"         => "Hem | allt om vältar",
            "navbar"        => 'home',
            "intro_mount"   => 'Allt om vältar',
            "intro_path"    => 'Hem'
        ];

        $page = $this->di->get("page");

        $page->add("mahw17/intro/subintro", $data, "subintro");
        $page->add("mahw17/home/home", $data, "main");

        return $page->render($data);
    }
}
