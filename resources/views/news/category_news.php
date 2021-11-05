<?php
include 'menu.php';
?>
<h1>Категория "<?=$category['title']?>"</h1>
<?php
if (count($news)) {
    foreach ($news as $item) {
        ?>
        <a href="<?=route('news.all')?>/<?=$item['slug']?>"><?=$item['title']?></a><br>
        <?php
    }
}
else {
    ?>
    <p>Новостей пока что нет</p>
    <?php
}
