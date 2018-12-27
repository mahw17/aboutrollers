<?php

namespace Anax\View;

/**
 * View to update a user.
 */


// Gather incoming variables and use default values if not set
$item = isset($item) ? $item : null;

// Create urls for navigation
$urlToView = url("user");

?>

<h1>Uppdatera en användare</h1>

<?= $form ?>

<p>
    <a href="<?= $urlToView ?>">Visa alla</a>
</p>
