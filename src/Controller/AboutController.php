<?php

namespace Mahw17\Controller;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

/**
 * Controller to hanle the About request
 * lets the user choose the stylesheet to use.
 */
class AboutController implements ContainerInjectableInterface
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
        $session->set('navbar', 'about');

        $data = [
            "title"         => "Om | allt om vältar",
            "navbar"        => 'about',
            "intro_mount"   => 'Allt om vältar',
            "intro_path"    => 'Om'
        ];

        $page = $this->di->get("page");

        $page->add("mahw17/intro/subintro", $data, "subintro");
        $page->add("mahw17/about/about", $data, "main");

        return $page->render($data);
    }
}
