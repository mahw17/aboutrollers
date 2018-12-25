<?php

namespace Anax\View;

use Mahw17\User\User;

/**
 * Template file to render a view.
 */

// Get framework
$session    = $this->di->get("session");

// Get session variables
$navbar     = $session->get('navbar', 'home');
$login      =  false;
if ($session->has('user', false)) {
    $login = true;
    $userid = $session->get('user');
    $user = new User();
    $user->setDb($this->di->get("dbqb"));
    $user->findById($userid);
    $gravatar = $user->gravatar;
}

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
            <a href="<?= url("tag") ?>"><i class="icon-tags"></i> Taggar </a>
        </li>
        <li class ="<?= $navbar == 'about' ? 'active' : ''; ?>">
            <a href="<?= url("about") ?>"><i class="icon-info-sign"></i> Om </a>
        </li>

        <li class="dropdown <?= $navbar == 'login' ? 'active' : ''; ?>">
        <?php if ($login) : ?>
            <a href="<?= url("user") ?>"><img class="gravatar" src="<?= $gravatar ?>" alt="" /></a>
            <ul class="dropdown-menu gravatar1">
                <li><a href="<?= url("user/logout") ?>">Logga ut</a></li>
                <li><a href="<?= url("user/update/" . $userid) ?>">Uppdatera konto</a></li>
                <li><a href="<?= url("user") ?>">Visa alla</a></li>
            </ul>
        <?php else : ?>
          <a href="<?= url("user") ?>"><i class="icon-user"></i></a>
          <ul class="dropdown-menu">
              <li><a href="<?= url("user/login") ?>">Logga in</a></li>
              <li><a href="<?= url("user/create") ?>">Skapa konto</a></li>
              <li><a href="<?= url("user") ?>">Visa alla</a></li>
          </ul>
        <?php endif ?>
        </li>

      </ul>
</nav>
