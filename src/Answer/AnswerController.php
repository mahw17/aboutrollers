<?php

namespace Mahw17\Answer;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;
use Mahw17\Answer\HTMLForm\CreateAnswerForm;

/**
 * A sample controller for handlingthe answer create route.
 */
class AnswerController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;

    /**
     * Description.
     *
     *
     * @throws Exception
     *
     * @return object as a response object
     */
    public function createAction(int $questionid) : object
    {
        // Load framework services
        $page = $this->di->get("page");
        $session = $this->di->get("session");

        // Active user id
        $userid = $session->get("user");

        // Collect data
        $form = new CreateAnswerForm($this->di, $userid, $questionid);
        $form->check();

        $data = [
            "title"         => "Besvara fråga",
            "navbar"        => 'tags',
            "intro_mount"   => 'Fråga',
            "intro_path"    => 'Besvara',
            "form"          => $form->getHTML(),
            "questionid"    => $questionid
        ];

        // Add and render views
        $page->add("mahw17/intro/subintro", $data, "subintro");
        $page->add("mahw17/answer/crud/create", $data, "main");

        return $page->render($data);
    }
}
