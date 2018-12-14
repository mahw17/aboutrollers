<?php

namespace Anax\View;

/**
 * Template file to render a view.
 */

// Get framework
$session    = $this->di->get("session");

// Get session variables
$navbar     = $session->get('navbar', 'home');
$login      = $session->has('user', false);

?>

<nav>
      <ul class="nav topnav">
        <li class="<?= $navbar == 'home' ? 'active' : ''; ?>">
          <a href="<?= url("") ?>"><i class="icon-home"></i> Hem </a>
        </li>
        <li class ="<?= $navbar == 'question' ? 'active' : ''; ?>">
            <a href="<?= url("question") ?>"><i class="icon-question-sign"></i> Frågor </a>
        </li>
        <li class ="<?= $navbar == 'tags' ? 'active' : ''; ?>">
            <a href="<?= url("tags") ?>"><i class="icon-tags"></i> Taggar </a>
        </li>
        <li class ="<?= $navbar == 'about' ? 'active' : ''; ?>">
            <a href="<?= url("about") ?>"><i class="icon-info-sign"></i> Om </a>
        </li>
        <li class="dropdown <?= $navbar == 'login' ? 'active' : ''; ?>">
          <a href="<?= url("user/login") ?>"><i class="icon-user" style="color:<?= $login ? 'green' : 'red' ?>"></i></a>
          <ul class="dropdown-menu">
                <?= !$login ? "<li><a href=".url("user/login").">Logga in</a></li>" : "<li><a href=".url("user/logout").">Logga ut</a></li>" ?>
          </ul>
        </li>
      </ul>
</nav>
