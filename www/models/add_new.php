<?php
    require __DIR__ . '/class_news.php';
    $upload_news = new News();

    if ($upload_news->Add_new_article()) {
        setcookie('add', 'new', time()+3600);
        header ('Location: /index.php');
    }
