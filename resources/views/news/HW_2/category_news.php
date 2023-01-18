
<?php
/*
<?php foreach ($news as $category => $news):?>
    <div style = "border: 2px solid red; margin: 10px">
        <p><?=$category?></p>
        <?php foreach ($news as $title => $text):?>
            <div style = "border: 2px solid red; margin: 10px">
                    <a href="/HW_2/<?=$?>/links_on_news">
                <p>Далее</p>
            </a>
            </div> 
        <?php endforeach;?>
    </div> 
<?php endforeach;?>
*/




foreach ($news as $category => $news):?>
    <div style = "border: 2px solid red; margin: 10px">
        <a href="<?=route('links_on_all_news', ['category' => $category])?>">
         <p><?= $category?></p>
        </a>
    </div> 
<?php endforeach;?>

?>

