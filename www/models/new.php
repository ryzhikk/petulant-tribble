 <?php

    require __DIR__ . '/class_news.php';

    $get_new = new News();
    $get_new->id = $_GET['id'];
    $new = $get_new->Get_one_article();