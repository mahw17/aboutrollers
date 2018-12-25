<?php

namespace Anax\View;

/**
 * View to create a new book.
 */
// Show all incoming variables/functions
//var_dump(get_defined_functions());
//echo showEnvironment(get_defined_vars());

// Create urls for navigation
$urlToViewQuestion = url("question/view/{$questionid}");


?><h1>Svara</h1>

<?= $form ?>

<p>
    <a href="<?= $urlToViewQuestion ?>">Tillbaka till fråga</a>
</p>
