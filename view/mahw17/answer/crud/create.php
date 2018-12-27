<?php

namespace Anax\View;

/**
 * View to create a new book.
 */

// Create urls for navigation
$urlToViewQuestion = url("question/view/{$questionid}");


?><h1>Svara</h1>

<?= $form ?>

<p>
    <a href="<?= $urlToViewQuestion ?>">Tillbaka till fråga</a>
</p>
