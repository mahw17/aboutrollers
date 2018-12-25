<?php

namespace Mahw17\Comment\HTMLForm;

use Anax\HTMLForm\FormModel;
use Psr\Container\ContainerInterface;
use Mahw17\Comment\Comment;

/**
 * Example of FormModel implementation.
 */
class CreateCommentForm extends FormModel
{
    /**
     * Constructor injects with DI container.
     *
     * @param \Psr\Container\ContainerInterface $di a service container
     */
    public function __construct(ContainerInterface $di, $userid, $source, $sourceid)
    {
        parent::__construct($di);

        $this->form->create(
            [
                "id" => __CLASS__,
                // "legend" => "Details of the item",
            ],
            [
                "body" => [
                    "label" => "Kommentar",
                    "type" => "text",
                    "validation" => ["not_empty"],
                ],

                "source" => [
                    "type" => "hidden",
                    "value" => $source,
                ],

                "sourceid" => [
                    "type" => "hidden",
                    "value" => $sourceid,
                ],

                "userid" => [
                    "type" => "hidden",
                    "value" => $userid,
                ],

                "submit" => [
                    "type" => "submit",
                    "value" => "Kommentera",
                    "callback" => [$this, "callbackSubmit"]
                ],
            ]
        );
    }



    /**
     * Callback for submit-button which should return true if it could
     * carry out its work and false if something failed.
     *
     * @return boolean true if okey, false if something went wrong.
     */
    public function callbackSubmit()
    {
        $comment = new Comment();
        $comment->setDb($this->di->get("dbqb"));
        $comment->body = $this->form->value("body");
        $comment->source = $this->form->value("source");
        $comment->sourceid = $this->form->value("sourceid");
        $comment->userid = $this->form->value("userid");
        $comment->save();

        // Update user rank - 1 point for a comment
        $user = new User();
        $user->setDb($this->di->get("dbqb"));
        $user->updateRank($comment->userid, 1);

        $this->form->addOutput("Kommentaren är registrerat.");
    }
}
