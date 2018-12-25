<?php

namespace Mahw17\Question;

use Anax\DatabaseActiveRecord\ActiveRecordModel;

/**
 * A database driven model using the Active Record design pattern.
 */
class Question extends ActiveRecordModel
{
    /**
     * @var string $tableName name of the database table.
     */
    protected $tableName = "Question";



    /**
     * Columns in the table.
     *
     * @var integer $id primary key auto incremented.
     */
    public $id;
    public $title;
    public $body;
    public $tags;
    public $userid;

    /**
     * Get details on item to load form with.
     *
     *
     * @return array
     */
    public function getLatestQuestions($limit = 3)
    {
        $res = $this->db->connect()
                        ->select("id, body, created")
                        ->from("Question")
                        ->orderBy("created DESC")
                        ->limit($limit)
                        ->execute()
                        ->fetchAll();

        return $res;
    }

    /**
     * Get details on item to load form with.
     *
     *
     * @return array
     */
    public function getQuestionDetailsAll()
    {
        $res = $this->db->connect()
                        ->select("Question.id AS qId, Question.title AS qTitle, Question.body AS qBody, Question.tags AS qTags, Question.created AS qCreated, User.id AS uId, User.gravatar AS uGravatar")
                        ->from("Question")
                        ->join("User", "Question.userid = User.id")
                        ->orderBy("Question.created DESC")
                        ->execute()
                        ->fetchAll();

        return $res;
    }

    /**
     * Get details on item to load form with.
     *
     *
     * @return array
     */
    public function getQuestionDetails($id)
    {
        $res = $this->db->connect()
                        ->select("Question.id AS qId, Question.title AS qTitle, Question.body AS qBody, Question.tags AS qTags, Question.created AS qCreated, User.id AS uId, User.gravatar AS uGravatar")
                        ->from("Question")
                        ->join("User", "Question.userid = User.id")
                        ->where("Question.id = {$id}")
                        ->orderBy("Question.created DESC")
                        ->execute()
                        ->fetchAll();

        return $res[0];
    }
}
