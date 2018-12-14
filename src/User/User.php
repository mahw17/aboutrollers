<?php

namespace Mahw17\User;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

/**
 * User authentication methods
 */
class User implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;


    /**
     *
     * @var array $users Valid users
     *
     */
    private $users = [];


    /**
     * Fetch user information from db and create private key value array
     *
     *
     */
    public function getUsers()
    {
        // Load framework services
        $db = $this->di->get("db");

        $db->connect();

        $sql = "SELECT * FROM users;";
        $res = $db->executeFetchAll($sql);

        foreach ($res as $user) {
            $this->users[$user->user] = [
                    'name' => $user->name,
                    'password' => $user->password
            ];
        }
    }

    /**
    * Login user and set session if user and password matches.
    *
    * @param $user     the supplied acronym of the user.
    * @param $password the supplied pasword of the user
    *
    * @return boolean true if user and password matches, else false.
    */
    public function loginUser($user, $password)
    {
        $res = $this->checkuserAndPassword($user, $password);

        if ($res === true) {
            // Set a value in the session, associated with a key.
            $this->di->get('session')->set("user", $user);
        }

        return $res;
    }

     /**
      * Check if the user can login with supplied credentials.
      *
      * @param $user     the supplied acronym of the user.
      * @param $password the supplied password of the user
      *
      * @return boolean true if user and password matches, else false.
      */
    public function checkUserAndPassword($user, $password)
    {
        $passwordHash = array_key_exists($user, $this->users)
            ? $this->users[$user]['password']
            : false;

        $res = $password == $passwordHash ? true : false;
        return $res;
    }




     /**
      * Get details of the logged in user, or false if user is not logged in.
      *
      * @return []|boolean array with details or false if user is not logged in.
      */
    public function getLoggedInUser()
    {
        // Load framework services
        $session = $this->di->get("session");

        $user = $session->has("user") //isset($_SESSION['user'])
            ? $session->get("user") //$_SESSION['user']
            : false;

        if ($user === false) {
            return false;
        }

        $res['user'] = $user;
        $res['name'] = $this->users[$user]['name'];
        $res['password'] = $this->users[$user]['password'];

        return $res;
    }


     /**
      * Logout user and remove details from the session.
      *
      * @return void.
      */
    public function logoutUser()
    {
        $this->di->get('session')->delete("user");
        return true;
    }
}
