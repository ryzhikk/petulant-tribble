 <?php

    require __DIR__ . '/News.php';

    $get_new = new News();
    $get_new->id = $_GET['id'];
    $new = $get_new->GetOneArticle();