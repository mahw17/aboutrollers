<?php

namespace Anax\View;

/**
 * Template file to render a view.
 */

// Create urls for navigation
$urlToCreateAnswer = url("answer/create/{$question->qId}");
$urlToCreateQuestionComment = url("comment/create/q/{$question->qId}/{$question->qId}");
$urlToTags = url("tag");

?>

<!-- Question section -->
<div class="row">
    <div class="span12">

        <div class="panel panel-success">
            <div class="panel-heading">
                <div class="questionTitle"><h1><?= $question->qTitle ?></h1></div>
                <div class="questionGravatar"><a href="<?= asset("user/view/{$question->uId}") ?>"><img class="gravatar" src="<?= $question->uGravatar ?>" alt="" /></a></div>
                <div class="questionDate">
                    <p><?= $question->qCreated ?></p>
                </div>
            </div>
            <div class="panel-body">
                <h2 class="question"><?= $question->qBody ?></h2>
                <!-- Comments -->
                <?php foreach ($qComments as $comment) : ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="questionTitle"><h4><?= $comment->qCommentBody ?></h4></div>
                            <div class="questionGravatar"><a href="<?= asset("user/view/{$comment->uId}") ?>"><img class="gravatar" src="<?= $comment->uGravatar ?>" alt="" /></a></div>
                            <div class="questionDate">
                                <p><?= $comment->qCommentCreated ?></p>
                            </div>
                        </div>

                    </div>
                <?php endforeach; ?>
                <?php if ($user) : ?>
                    <a href="<?= $urlToCreateQuestionComment ?>">Lägg till kommentar</a>
                <?php endif; ?>
            </div>
            <div class="panel-footer">
                <?php foreach (explode(";", $question->qTags) as $tag) : ?>
                    <a href="<?= $urlToTags ?>" class="btn btn-theme"><i class="icon-tag"> <?= $tag ?></i></a>
                <?php endforeach; ?>
                <?php if ($user) : ?>
                    <a href="<?= $urlToCreateAnswer ?>" class="btn btn-success btn-answer">SVARA</a>
                <?php endif; ?>
            </div>
        </div>

    </div>
</div>


<!-- Answer section -->
<?php foreach ($answers as $answer) : ?>
<div class="row">
    <div class="span12">

        <div class="panel panel-warning">

            <div class="panel-heading">
                <div class="questionTitle"><h2><?= $answer->aTitle ?></h2></div>
                <div class="questionGravatar"><a href="<?= asset("user/view/{$answer->uId}") ?>"><img class="gravatar" src="<?= $answer->uGravatar ?>" alt="" /></a></div>
                <div class="questionDate">
                    <p><?= $answer->aCreated ?></p>
                </div>
            </div>

            <div class="panel-body">
                <h3 class="question"><?= $answer->aBody ?></h3>

                <!-- Comments -->
                <?php foreach ($answer->aComments as $comment) : ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="questionTitle"><h4><?= $comment->qCommentBody ?></h4></div>
                            <div class="questionGravatar"><a href="<?= asset("user/view/{$comment->uId}") ?>"><img class="gravatar" src="<?= $comment->uGravatar ?>" alt="" /></a></div>
                            <div class="questionDate">
                                <p><?= $comment->qCommentCreated ?></p>
                            </div>
                        </div>

                    </div>
                <?php endforeach; ?>
                <?php if ($user) : ?>
                    <a href="<?= url("comment/create/a/{$answer->aId}/{$question->qId}") ?>">Lägg till kommentar</a>
                <?php endif; ?>
            </div>

        </div>

    </div>
</div>
<?php endforeach; ?>
