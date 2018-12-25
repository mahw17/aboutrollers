<?php

namespace Mahw17\Controller;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;
use Mahw17\Question\Question;
use Mahw17\Tag\Tag;
use Mahw17\User\User;

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

        // Collect Data

        // Questions
        $question = new Question();
        $question->setDb($this->di->get("dbqb"));

        // Tags
        $tag = new Tag();
        $tag->setDb($this->di->get("dbqb"));

        // Users
        $user = new User();
        $user->setDb($this->di->get("dbqb"));

        $data = [
            "title"         => "Hem | allt om vältar",
            "navbar"        => 'home',
            "intro_mount"   => 'Allt om vältar',
            "intro_path"    => 'Hem',
            "questions"     => $question->getLatestQuestions(),
            "tags"          => $tag->getPopularTags(),
            "users"         => $user->getActiveUsers()
        ];

        $page = $this->di->get("page");

        $page->add("mahw17/intro/subintro", $data, "subintro");
        $page->add("mahw17/home/home", $data, "main");

        return $page->render($data);
    }
}
