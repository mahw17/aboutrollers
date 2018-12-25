<?php
$tags = "test;test1 hej; sdf, sdf";

$tags = preg_split("/[\s,;]+/", $tags);

echo '<pre>'; print_r($tags); echo '</pre>';

 ?>
