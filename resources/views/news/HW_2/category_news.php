<div style="border: 2px solid red; margin: 10px">
    <h1>Категории новостей:</h1>
</div>

<?php foreach ($news as $category => $title):?>
<div style="border: 2px solid red; margin: 10px">
    <a href="<?=route('links_on_all_news_title', ['category' => $category])?>">
        <p><?= $category?></p>
    </a>
</div>
<?php endforeach;?>

