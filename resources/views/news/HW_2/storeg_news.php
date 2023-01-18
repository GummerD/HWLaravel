<?php foreach ($news as $category  => $news):?>
    <div style = "border: 2px solid red; margin: 10px">
        <h1><?=$category?></h1>
        <?php foreach ($news as $title => $text):?>
            <h2><?=$title?></h2>
            <p><?=$text?></p> 
        <?php endforeach;?>  
    </div> 
<?php endforeach;?>