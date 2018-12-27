<?php

namespace Mahw17\User\HTMLForm;

use Anax\HTMLForm\FormModel;
use Psr\Container\ContainerInterface;
use Mahw17\User\User;

/**
 * Form for updating existing user
 */
class UpdateUserForm extends FormModel
{
    /**
     * Constructor injects with DI container.
     *
     * @param \Psr\Container\ContainerInterface $di a service container
     */
    public function __construct(ContainerInterface $di, $id)
    {
        parent::__construct($di);
        $user = $this->getItemDetails($id);
        $this->form->create(
            [
                "id" => __CLASS__,
            ],
            [
                "id" => [
                    "label"       => "ID",
                    "type" => "text",
                    "validation" => ["not_empty"],
                    "readonly" => true,
                    "value" => $user->id,
                ],
                "acronym" => [
                    "label"       => "Namn",
                    "type" => "text",
                    "validation" => ["not_empty"],
                    "value" => $user->acronym,
                ],

                "email" => [
                    "label"       => "E-post",
                    "type"        => "email",
                    "validation" => ["not_empty"],
                    "value" => $user->email,
                ],

                "password" => [
                    "label"       => "Lösenord",
                    "type"        => "password",
                    "validation" => ["not_empty"],
                ],

                "password-again" => [
                    "label"     => "Repetera lösenord",
                    "type"        => "password",
                    "validation" => [
                        "match" => "password"
                    ],
                ],

                "submit" => [
                    "type" => "submit",
                    "value" => "Uppdatera användare",
                    "callback" => [$this, "callbackSubmit"]
                ],
            ]
        );
    }

    /**
     * Get details on item to load form with.
     *
     * @param integer $id get details on item with id.
     *
     * @return Question
     */
    public function getItemDetails($id) : object
    {
        $user = new User();
        $user->setDb($this->di->get("dbqb"));
        $user->find("id", $id);
        return $user;
    }


    /**
     * Callback for submit-button which should return true if it could
     * carry out its work and false if something failed.
     *
     * @return boolean true if okey, false if something went wrong.
     */
    public function callbackSubmit()
    {
        $user = new User();
        $user->setDb($this->di->get("dbqb"));
        $user->find("id", $this->form->value("id"));


        // Get values from the submitted form
        $user->acronym       = $this->form->value("acronym");
        $user->email         = $this->form->value("email");

        // Check password matches
        $password      = $this->form->value("password");
        $passwordAgain = $this->form->value("password-again");

        if ($password !== $passwordAgain) {
            $this->form->rememberValues();
            $this->form->addOutput("Password did not match.");
            return false;
        }

        $user->setPassword($this->form->value("password"));

        // Creating the Gravatar - Hash
        $user->gravatar = "https://www.gravatar.com/avatar/" . md5(strtolower(trim($user->email))) . "?d=robohash";
        $user->save();

        $this->form->addOutput("Användare " . $user->acronym . " är nu uppdaterad.");
        return true;
    }
}
