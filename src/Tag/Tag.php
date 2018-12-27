<?php

namespace Mahw17\Tag;

use Anax\DatabaseActiveRecord\ActiveRecordModel;

/**
 * A database driven model.
 */
class Tag extends ActiveRecordModel
{

    /**
     * @var string $tableName name of the database table.
     */
    protected $tableName = "Tag";

    /**
     * Columns in the table.
     *
     * @var integer $id primary key auto incremented.
     */
    public $id;
    public $tag;
    public $questionid;

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
        $this->find("tag", $acronym);
        return password_verify($password, $this->password);
    }

    /**
     * Callback what to do if the form was successfully submitted, this
     * happen when the submit callback method returns true. This method
     * can/should be implemented by the subclass for a different behaviour.
     */
    public function tagHandler($tags)
    {
        // Convert string to uppercase
        $tags = strtoupper($tags);

        // Split string into array
        $tags = preg_split("/[\s,;]+/", $tags);

        // Convert array to string and return
        return implode(";", $tags);
    }



    /**
     * Get details on item to load form with.
     *
     *
     * @return array
     */
    public function getTagsDetails()
    {
        $res = $this->db->connect()
                        ->select("Tag.tag, Tag.questionid, Question.body")
                        ->from("Tag")
                        ->join("Question", "Tag.questionid = Question.id")
                        ->execute()
                        ->fetchAll();

        foreach ($res as $value) {
            $array[$value->tag][] = [
                "questionid" => $value->questionid,
                "body" => $value->body
            ];
        }

        return $array;
    }

    /**
     * Get details on item to load form with.
     *
     *
     * @return array
     */
    public function getPopularTags($limit = 3)
    {
        $res = $this->db->connect()
                        ->select("COUNT(id) AS Qty, Tag")
                        ->from("Tag")
                        ->groupBy("Tag")
                        ->orderBy("Qty DESC")
                        ->limit($limit)
                        ->execute()
                        ->fetchAll();

        return $res;
    }
}
