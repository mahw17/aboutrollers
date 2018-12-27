<?php

namespace Anax\View;

/**
 * View to create a new user.
 */

// Gather incoming variables and use default values if not set
$items = isset($items) ? $items : null;

// Create urls for navigation
$urlToViewItems = url("user");

?>

<h1>Skapa ny användare</h1>

<?= $form ?>

<p>
    <a href="<?= $urlToViewItems ?>">Visa alla</a>
</p>
