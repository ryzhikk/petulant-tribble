<?php
    require __DIR__ . '/News.php';
    $upload_news = new News();

    if (News::AddNewArticle()) {
        setcookie('add', 'new', time()+3600);
        header ('Location: /index.php');
    }

    else {
        echo 'Ошибка!';
    }
