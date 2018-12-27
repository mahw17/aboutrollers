<?php

namespace Mahw17\Answer;

use Anax\DatabaseActiveRecord\ActiveRecordModel;
use Mahw17\Comment\Comment;

/**
 * A database driven model.
 */
class Answer extends ActiveRecordModel
{

    /**
     * @var string $tableName name of the database table.
     */
    protected $tableName = "Answer";

    /**
     * Columns in the table.
     *
     * @var integer $id primary key auto incremented.
     */
    public $id;
    public $title;
    public $body;
    public $questionid;
    public $userid;

    /**
     * Get details on item to load form with.
     *
     *
     * @return array
     */
    public function getAnswerDetails($questionid)
    {
        $res = $this->db->connect()
                        ->select("Answer.id AS aId, Answer.title AS aTitle, Answer.body AS aBody, Answer.created AS aCreated, User.id AS uId, User.gravatar AS uGravatar")
                        ->from("Answer")
                        ->join("User", "Answer.userid = User.id")
                        ->where("Answer.questionid = {$questionid}")
                        ->orderBy("Answer.created DESC")
                        ->execute()
                        ->fetchAll();

        // Add answer comments
        $comment = new Comment();
        $comment->setDb($this->db);
        foreach ($res as $answer) {
            $answer->aComments = $comment->getComments('a', $answer->aId);
        }

        return $res;
    }
}
