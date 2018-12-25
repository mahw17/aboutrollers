<?php

namespace Anax\View;

/**
 * View to display all books.
 */
// Show all incoming variables/functions
//var_dump(get_defined_functions());
//echo showEnvironment(get_defined_vars());

// Gather incoming variables and use default values if not set
$items = isset($items) ? $items : null;

// Create urls for navigation
$urlToCreate = url("user/create");


?><h1>Användare</h1>

<?php if (!$items) : ?>
    <p>Det finns inga användare att visa.</p>
<?php
    return;
endif;
?>

<table class="table table-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Namn</th>
        <th scope="col">Epost</th>
        <th scope="col">Ranking</th>
        <th scope="col">Gravatar</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
        <?php foreach ($items as $item) : ?>
        <tr>
            <th scope="row"><?= $item->id ?></th>
            <td><?= $item->acronym ?></td>
            <td><?= $item->email ?></td>
            <td><?= $item->rank ?></td>
            <td><img class="gravatar" src="<?= $item->gravatar ?>" alt="" /></td>
            <th scope="row"><a href="<?= url("user/view/{$item->id}"); ?>">INFO</a></th>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
