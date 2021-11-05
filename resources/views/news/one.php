<?php
include 'menu.php';

if ($item) {
    ?>
    <h1><?=$item['title']?></h1>
    <p><?=$item['text']?></p>
    <?php
}
else {
    ?>
    <p>Новость не найдена</p>
    <?php
}
?>

