<?php
include 'menu.php';
?>
    <h1>Категории</h1>
<?php
foreach ($categories as $item) {
    ?>
    <a href="<?=route('news.categories')?>/<?=$item['slug']?>"><?=$item['title']?></a><br>
    <?php
}
