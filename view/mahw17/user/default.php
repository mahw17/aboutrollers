<?php

namespace Anax\View;

/**
 * Template file to render a view.
 */

?>

<!-- User info section -->
<div class="row">
    <div class="span12">
        <div class="span3">
            <img class="gravatar" src="<?= $user->gravatar ?>" alt="" />
            <p>Medlem sedan:</p>
            <p><?= $user->created ?></p>
        </div>
        <div class="span6">
            <h1><?= $user->acronym ?></h1>
            <h4><?= $user->email ?></h4>
        </div>
        <div class="span2">
            <h3>RANK</h3>
            <h3><?= $user->rank ?></h3>
        </div>
    </div>
</div>


<div class="row">
        <!-- User question section -->
          <div class="span6">
            <aside>
              <div class="widget">
                <h4 class="rheading">Frågor<span></span></h4>
                <ul class="recent-posts">
                    <?php foreach ($questions as $question) : ?>
                        <li><a href="<?= url("question/view/{$question->id}"); ?>"><?= $question->title ?></a></li>
                    <?php endforeach; ?>
                </ul>
              </div>
            </aside>
          </div>

          <!-- User answer section -->
          <div class="span6">
            <aside>
              <div class="widget">
                <h4 class="rheading">Svar<span></span></h4>
                <ul class="recent-posts">
                    <?php foreach ($answers as $answer) : ?>
                        <li><a href="<?= url("question/view/{$answer->questionid}"); ?>"><?= $answer->title ?></a></li>
                    <?php endforeach; ?>
                </ul>
              </div>
            </aside>
          </div>

        </div>
