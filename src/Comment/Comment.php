<?php

namespace Mahw17\Comment;


use Anax\DatabaseActiveRecord\ActiveRecordModel;

/**
 * A database driven model.
 */
class Comment extends ActiveRecordModel
{

    /**
     * @var string $tableName name of the database table.
     */
    protected $tableName = "Comment";

    /**
     * Columns in the table.
     *
     * @var integer $id primary key auto incremented.
     */
    public $id;
    public $body;
    public $source;
    public $sourceid;
    public $userid;

    /**
     * Get details on item to load form with.
     *
     *
     * @return array
     */
    public function getComments($source, $sourceid)
    {
        $res = $this->db->connect()
                        ->select("Comment.body AS qCommentBody, Comment.created AS qCommentCreated, User.id AS uId, User.gravatar AS uGravatar")
                        ->from("Comment")
                        ->join("User", "Comment.userid = User.id")
                        ->where("Comment.source = '{$source}' AND Comment.sourceid = {$sourceid}")
                        ->orderBy("Comment.created DESC")
                        ->execute()
                        ->fetchAll();

        return $res;
    }

}
