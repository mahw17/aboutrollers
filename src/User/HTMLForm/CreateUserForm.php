<?php

namespace Mahw17\User\HTMLForm;

use Anax\HTMLForm\FormModel;
use Psr\Container\ContainerInterface;
use Mahw17\User\User;

/**
 * Create a new user form
 */
class CreateUserForm extends FormModel
{
    /**
     * Constructor injects with DI container.
     *
     * @param \Psr\Container\ContainerInterface $di a service container
     */
    public function __construct(ContainerInterface $di)
    {
        parent::__construct($di);
        $this->form->create(
            [
                "id" => __CLASS__,
                "legend" => "Skapa konto",
            ],
            [
                "acronym" => [
                    "label"       => "Namn",
                    "type"        => "text",
                    "validation" => ["not_empty"],
                ],

                "email" => [
                    "label"       => "E-post",
                    "type"        => "email",
                    "validation" => ["not_empty"],
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
                    "value" => "Skapa användare",
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
        // Get values from the submitted form
        $acronym       = $this->form->value("acronym");
        $email         = $this->form->value("email");
        $password      = $this->form->value("password");
        $passwordAgain = $this->form->value("password-again");

        // Check password matches
        if ($password !== $passwordAgain) {
            $this->form->rememberValues();
            $this->form->addOutput("Password did not match.");
            return false;
        }

        // Creating the Gravatar - Hash
        $gravatar = "https://www.gravatar.com/avatar/" . md5(strtolower(trim($email))) . "?d=robohash";

        // Use active record to save new user to database
        $user = new User();
        $user->setDb($this->di->get("dbqb"));
        $user->acronym = $acronym;
        $user->email = $email;
        $user->gravatar = $gravatar;
        $user->rank = 0;
        $user->setPassword($password);
        $user->save();

        return true;
    }
}
