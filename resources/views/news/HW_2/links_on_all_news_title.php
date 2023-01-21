<div style="border: 2px solid red; margin: 10px">
    <h1>Список новостей:</h1>
</div>

<?php foreach ($category as $title => $text) :
    $url = $_SERVER['REQUEST_URI'];
    $arr = explode('/', $url);
?>
    <div style="border: 2px solid red; margin: 10px">
        <a href="<?= route(
                        'links_on_text_news',
                        [
                            'category' => $arr[3],
                            'title' => $title

                        ]
                    ) ?>">
            <p><?= $title ?></p>
        </a>
    </div>
<?php endforeach; ?>

<div style="border: 2px solid red; margin: 10px">
    <a href="<?= route('category_news') ?>">
        <p>
            <<< Вернуться обратно </p>
    </a>
</div>