<?php

namespace Mahw17\Question;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;
use Mahw17\Question\HTMLForm\CreateForm;
use Mahw17\Question\HTMLForm\EditForm;
use Mahw17\Question\HTMLForm\DeleteForm;
use Mahw17\Question\HTMLForm\UpdateForm;
use Mahw17\Answer\Answer;
use Mahw17\Comment\Comment;

// use Anax\Route\Exception\ForbiddenException;
// use Anax\Route\Exception\NotFoundException;
// use Anax\Route\Exception\InternalErrorException;

/**
 * A sample controller to show how a controller class can be implemented.
 */
class QuestionController implements ContainerInjectableInterface
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
        $this->session->set('navbar', 'question');
    }

    /**
     * Show all items.
     *
     * @return object as a response object
     */
    public function indexActionGet() : object
    {
        // Load framework services
        $page = $this->di->get("page");
        $session = $this->di->get("session");

        // Active user id
        $userid = $session->get("user", false);

        // Collect data
        $question = new Question();
        $question->setDb($this->di->get("dbqb"));

        $data = [
            "title"         => "Frågor | Samtliga",
            "navbar"        => 'question',
            "intro_mount"   => 'Frågor',
            "intro_path"    => 'Samtliga',
            "user"          => $userid,
            "items" => $question->getQuestionDetailsAll()

        ];

        // Add and render views
        $page->add("mahw17/intro/subintro", $data, "subintro");
        $page->add("mahw17/question/crud/view-all", $data, "main");

        return $page->render($data);
    }



    /**
     * Handler with form to create a new item.
     *
     * @return object as a response object
     */
    public function createAction() : object
    {
        // Load framework services
        $page = $this->di->get("page");
        $session = $this->di->get("session");

        // Collect data
        $form = new CreateForm($this->di, $userid);
        $form->check();

        $data = [
            "title"         => "Frågor | Skapa ny",
            "navbar"        => 'question',
            "intro_mount"   => 'Frågor',
            "intro_path"    => 'Skapa ny',
            "form" => $form->getHTML()
        ];

        // Add and render views
        $page->add("mahw17/intro/subintro", $data, "subintro");
        $page->add("mahw17/question/crud/create", $data, "main");

        return $page->render($data);
    }



    /**
     * View specific question
     *
     * @param int $id the question id to view.
     *
     * @return object as a response object
     */
    public function viewAction(int $questionid) : object
    {
        // Load framework services
        $page = $this->di->get("page");
        $session = $this->di->get("session");

        // Active user id
        $userid = $session->get("user", false);

        // Collect data

            // Question Info
            $question = new Question();
            $question->setDb($this->di->get("dbqb"));
            $questionInfo = $question->getQuestionDetails($questionid);

            // Answer Info
            $answer = new Answer();
            $answer->setDb($this->di->get("dbqb"));
            $answerInfo = $answer->getAnswerDetails($questionid);

            // Comment Info
            $comment = new Comment();
            $comment->setDb($this->di->get("dbqb"));

                // Question comments
                $qComments = $comment->getComments('q', $questionid);


        $data = [
            "title"         => "Frågor",
            "navbar"        => 'question',
            "intro_mount"   => 'Frågor',
            "intro_path"    => 'Visa',
            "user"          => $userid,
            "question"      => $questionInfo,
            "answers"       => $answerInfo,
            "qComments"     => $qComments
        ];

        // Add and render views
        $page->add("mahw17/intro/subintro", $data, "subintro");
        $page->add("mahw17/question/default", $data, "main");

        return $page->render($data);
    }


}
