<?php

namespace Anax\View;

/**
 * View to display all books.
 */

// Gather incoming variables and use default values if not set
$items = isset($items) ? $items : null;

// Create urls for navigation
$urlToCreate = url("question/create");

?><h1>Frågor</h1>

<?php if ($user) : ?>
<p>
    <a href="<?= $urlToCreate ?>">Skapa ny fråga</a>
</p>
<?php endif; ?>

<?php if (!$items) : ?>
    <p>Det finns inga frågor att visa.</p>
    <?php
    return;
endif;
?>

<table class="table table-sm">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Titel</th>
        <th scope="col">Fråga</th>
        <th scope="col">Datum</th>
        <th scope="col">Frågeställare</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($items as $item) : ?>
    <tr>
        <th scope="col">
            <a href="<?= url("question/view/{$item->qId}"); ?>"><?= $item->qId ?></a>
        </td>
        <td><?= $item->qTitle ?></td>
        <td><?= $item->qBody ?></td>
        <td><?= $item->qCreated ?></td>
        <td>
            <a href="<?= url("user/view/{$item->uId}"); ?>">
                <img class="gravatar" src="<?= $item->uGravatar ?>" alt="" /></td>
            </a>
    </tr>
    <?php endforeach; ?>
</tbody>
</table>
