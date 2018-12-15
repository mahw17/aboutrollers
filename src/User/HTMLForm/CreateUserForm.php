<?php

namespace Mahw17\User\HTMLForm;

use Anax\HTMLForm\FormModel;
use Psr\Container\ContainerInterface;
use Mahw17\User\User;

/**
 * Example of FormModel implementation.
 */
class CreateUserForm extends FormModel
{
    /**
     * Constructor injects with DI container.
     *
     * @param Psr\Container\ContainerInterface $di a service container
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
                    "required"
                ],

                "email" => [
                    "label"       => "E-post",
                    "type"        => "email",
                    "required"
                ],

                "password" => [
                    "label"       => "Lösenord",
                    "type"        => "password",
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
        if ($password !== $passwordAgain ) {
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
        $user->setPassword($password);
        $user->save();

        $this->form->addOutput("Användare " . $user->acronym . " är nu skapad.");
        return true;
    }
}
