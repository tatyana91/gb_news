<?php
include 'menu.php';
?>
<h1>Новости</h1>
<?php
foreach ($news as $item) {
    ?>
    <a href="<?=route('news.all')?>/<?=$item['slug']?>"><?=$item['title']?></a><br>
    <?php
}
