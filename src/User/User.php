<?php

namespace Mahw17\User;

use Anax\DatabaseActiveRecord\ActiveRecordModel;

/**
 * A database driven model.
 */
class User extends ActiveRecordModel
{

    /**
     * @var string $tableName name of the database table.
     */
    protected $tableName = "User";

    /**
     * Columns in the table.
     *
     * @var integer $id primary key auto incremented.
     */
    public $id;
    public $email;
    public $acronym;
    public $password;
    public $rank;
    public $gravatar;

    /**
     * Set the password.
     *
     * @param string $password the password to use.
     *
     * @return void
     */
    public function setPassword($password)
    {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    /**
     * Verify the acronym and the password, if successful the object contains
     * all details from the database row.
     *
     * @param string $acronym  acronym to check.
     * @param string $password the password to use.
     *
     * @return boolean true if acronym and password matches, else false.
     */
    public function verifyPassword($acronym, $password)
    {
        $this->find("acronym", $acronym);
        return password_verify($password, $this->password);
    }

    /**
     * Verify the acronym and the password, if successful the object contains
     * all details from the database row.
     *
     * @param integer $id  user to be updated.
     * @param integer $sessionId activeUser.
     *
     * @return boolean true if id and sessionId matches, else false.
     */
    public function verifyUser($id, $sessionId)
    {
        return $id === $sessionId;
    }

    /**
     * Update user rank
     *
     * @param integer $id  user id to be updated.
     * @param integer $points points to add to user rank.
     *
     */
    public function updateRank($id, $points)
    {
        $this->find("id", $id);
        $this->rank = $this->rank + $points;
        $this->save();
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
     * Get details on item to load form with.
     *
     *
     * @return array
     */
    public function getActiveUsers($limit = 3)
    {
        $res = $this->db->connect()
                        ->select("id, acronym, rank")
                        ->from("User")
                        ->orderBy("rank DESC")
                        ->limit($limit)
                        ->execute()
                        ->fetchAll();

        return $res;
    }
}
