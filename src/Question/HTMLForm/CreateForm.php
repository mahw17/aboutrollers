<?php

namespace Mahw17\Question\HTMLForm;

use Anax\HTMLForm\FormModel;
use Anax\TextFilter\TextFilter;
use Psr\Container\ContainerInterface;
use Mahw17\Question\Question;
use Mahw17\Tag\Tag;
use Mahw17\User\User;

/**
 * Form to create an item.
 */
class CreateForm extends FormModel
{
    /**
     * Constructor injects with DI container.
     *
     * @param Psr\Container\ContainerInterface $di a service container
     */
    public function __construct(ContainerInterface $di, $userid)
    {
        parent::__construct($di);
        $this->form->create(
            [
                "id" => __CLASS__,
                // "legend" => "Details of the item",
            ],
            [
                "title" => [
                    "label" => "Titel",
                    "type" => "text",
                    "validation" => ["not_empty"],
                ],

                "body" => [
                    "label" => "Frågan",
                    "type" => "text",
                    "validation" => ["not_empty"],
                ],

                "tags" => [
                    "label" => "Taggar",
                    "type" => "text",
                ],

                "userid" => [
                    // "label" => "Frågan",
                    "type" => "hidden",
                    "value" => $userid,
                ],

                "submit" => [
                    "type" => "submit",
                    "value" => "Skapa fråga",
                    "callback" => [$this, "callbackSubmit"]
                ],
            ]
        );
    }



    /**
     * Callback for submit-button which should return true if it could
     * carry out its work and false if something failed.
     *
     * @return bool true if okey, false if something went wrong.
     */
    public function callbackSubmit() : bool
    {
        $question = new Question();
        $question->setDb($this->di->get("dbqb"));

        $filter = new TextFilter();

        $question->title  = $this->form->value("title");
        $question->body = $filter->doFilter($this->form->value("body"),"markdown");
        $question->userid = $this->form->value("userid");

        // Tag handler
        $tag = new Tag($this->di);
        $question->tags = $tag->tagHandler($this->form->value("tags"));

        $question->save();

        foreach (explode(";",$question->tags) as $newTag) {
            $tag = new Tag();
            $tag->setDb($this->di->get("dbqb"));
            $tag->tag  = $newTag;
            $tag->questionid = $question->id;
            $tag->save();
        }

        // Update user rank - 2 points for a question
        $user = new User();
        $user->setDb($this->di->get("dbqb"));
        $user->updateRank($question->userid, 2);

        return true;
    }



    /**
     * Callback what to do if the form was successfully submitted, this
     * happen when the submit callback method returns true. This method
     * can/should be implemented by the subclass for a different behaviour.
     */
    public function callbackSuccess()
    {
        $this->di->get("response")->redirect("question")->send();
    }



    // /**
    //  * Callback what to do if the form was unsuccessfully submitted, this
    //  * happen when the submit callback method returns false or if validation
    //  * fails. This method can/should be implemented by the subclass for a
    //  * different behaviour.
    //  */
    // public function callbackFail()
    // {
    //     $this->di->get("response")->redirectSelf()->send();
    // }
}
