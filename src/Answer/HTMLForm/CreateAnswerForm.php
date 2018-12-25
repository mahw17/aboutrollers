<?php

namespace Mahw17\Answer\HTMLForm;

use Anax\HTMLForm\FormModel;
use Psr\Container\ContainerInterface;
use Mahw17\Answer\Answer;
use Mahw17\Question\Question;
use Mahw17\User\User;


/**
 * Example of FormModel implementation.
 */
class CreateAnswerForm extends FormModel
{
    /**
     * Constructor injects with DI container.
     *
     * @param \Psr\Container\ContainerInterface $di a service container
     */
    public function __construct(ContainerInterface $di, $userid, $questionid)
    {
        parent::__construct($di);

        // Collect question information
        $question = new Question();
        $question->setDb($this->di->get("dbqb"));
        $question->find("id", $questionid);

        $this->form->create(
            [
                "id" => __CLASS__,
                // "legend" => "Details of the item",
            ],
            [
                "title" => [
                    "label" => "Titel",
                    "type" => "text",
                    "value" => "SV: " . $question->title,
                    "readonly" => true,
                    "validation" => ["not_empty"],
                ],

                "body" => [
                    "label" => "Svaret",
                    "type" => "text",
                    "validation" => ["not_empty"],
                ],

                "questionid" => [
                    "type" => "hidden",
                    "value" => $question->id,
                ],

                "userid" => [
                    "type" => "hidden",
                    "value" => $userid,
                ],

                "submit" => [
                    "type" => "submit",
                    "value" => "Svara",
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
        $answer = new Answer();
        $answer->setDb($this->di->get("dbqb"));
        $answer->title  = $this->form->value("title");
        $answer->body = $this->form->value("body");
        $answer->questionid = $this->form->value("questionid");
        $answer->userid = $this->form->value("userid");
        $answer->save();

        // Update user rank - 3points for an answer
        $user = new User();
        $user->setDb($this->di->get("dbqb"));
        $user->updateRank($answer->userid, 3);

        $this->form->addOutput("Svaret är registrerat.");
    }
}
