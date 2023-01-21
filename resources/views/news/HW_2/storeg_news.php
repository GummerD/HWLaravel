<div style="border: 2px solid red; margin: 10px">
    <h1>Новостной портал HW_2 Laravel</h1>
</div>

<?php foreach ($news as $category  => $news):?>
    <div style = "border: 2px solid red; margin: 10px">
        <div style = "border: 2px solid red; margin: 10px">
            <h1><?=$category?></h1>
        </div>
        <?php foreach ($news as $title => $text):?>
            <h2><?=$title?></h2>
            <p><?=$text?></p> 
        <?php endforeach;?>  
    </div> 
<?php endforeach;?>

<div style="border: 2px solid red; margin: 10px">
    <a href="<?= route('category_news') ?>">
        <p>
            Выбрать категорию новостей >>> </p>
    </a>
</div>

<div style="border: 2px solid red; margin: 10px">
    <a href="<?= route('authorization_page') ?>">
        <p>
            Пройти авторизацию >>> </p>
    </a>
</div>

<div style="border: 2px solid red; margin: 10px">
    <a href="<?= route('insert_news') ?>">
        <p>
            Добавить новость >>> </p>
    </a>
</div>