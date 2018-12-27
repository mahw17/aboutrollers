<?php

namespace Mahw17\Comment;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;
use Mahw17\Comment\HTMLForm\CreateCommentForm;

/**
 * A controller to handle the route for creating new comments
 */
class CommentController implements ContainerInjectableInterface
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
    public function createAction($source, int $sourceid, int $questionid) : object
    {
        // Load framework services
        $page = $this->di->get("page");
        $session = $this->di->get("session");

        // Active user id
        $userid = $session->get("user");

        // Collect data
        $form = new CreateCommentForm($this->di, $userid, $source, $sourceid);
        $form->check();

        $data = [
            "title"         => "Kommentera",
            "navbar"        => 'tags',
            "intro_mount"   => 'Kommentar',
            "intro_path"    => 'Skapa',
            "form"          => $form->getHTML(),
            "questionid"    => $questionid
        ];

        // Add and render views
        $page->add("mahw17/intro/subintro", $data, "subintro");
        $page->add("mahw17/comment/crud/create", $data, "main");

        return $page->render($data);
    }
}
