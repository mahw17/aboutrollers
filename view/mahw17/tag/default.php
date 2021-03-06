<?php

namespace Anax\View;

/**
 * Template file to render a view.
 */

?>

<!-- Question section -->
<div class="row">

    <?php foreach ($tags as $key => $questions) : ?>
        <div class="span4">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <?= $key ?>
                </div>
                <div class="panel-body">
                    <?php foreach ($questions as $question) : ?>
                        <a href="<?= url("question/view/{$question['questionid']}"); ?>"><p><?= $question["body"] ?></p></a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

</div>
