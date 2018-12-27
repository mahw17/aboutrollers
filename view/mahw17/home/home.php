<?php

namespace Anax\View;

/**
 * Template file to render a view.
 */

?>


        <div class="row">
          <div class="span12">
            <h2>Välkommen till allt om vältar</h2>
            <h5><i class=" icon-info-sign icon-circled icon-32 active"></i> Sidan med alla frågor och svar om just vältar!</h5>
          </div>
        </div>

        <div class="row">
                  <div class="span4">
                    <aside>
                      <div class="widget">
                        <h4 class="rheading">Senaste frågorna<span></span></h4>
                        <ul class="recent-posts">
                            <?php foreach ($questions as $question) : ?>
                                <li>
                                    <a href="<?= url("question/view/{$question->id}"); ?>"><?= $question->body ?></a>
                                    <div class="clear"></div>
                                    <span class="date"><i class="icon-calendar"></i> <?= $question->created ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                      </div>
                    </aside>
                  </div>

                  <div class="span4">
                    <aside>
                      <div class="widget">
                        <h4 class="rheading">Populäraste taggarna<span></span></h4>
                        <ul class="recent-posts">
                            <?php foreach ($tags as $tag) : ?>
                                <li>
                                    <a href="<?= url("tag") ?>" class="btn btn-theme"><?= $tag->Tag ?> (<?= $tag->Qty ?>)</a>
                                </li>
                            <?php endforeach; ?>

                        </ul>
                      </div>
                    </aside>
                  </div>
                  <div class="span4">
                    <aside>
                      <div class="widget">
                        <h4 class="rheading">Aktivaste användare<span></span></h4>
                        <ul class="recent-posts">
                            <?php foreach ($users as $user) : ?>
                                <li>
                                    <a href="<?= url("user/view/{$user->id}"); ?>"><?= $user->acronym ?></a>
                                    <div class="clear"></div>
                                    <span class="date"><i class="icon-thumbs-up"></i> <?= $user->rank ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                      </div>
                    </aside>
                  </div>
                </div>
