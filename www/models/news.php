<?php
/* require __DIR__ . '/../functions/sql.php';

    function News_getAll()
    {
        $query = "SELECT * FROM news ORDER BY time DESC";
        $newsArr = sql_query($query);
        return $newsArr;

    ###Старый код###

    } */


require __DIR__ . '/class_news.php';
require __DIR__ . '/class_bd.php';

$listNews = new Sql_query();

$news = $listNews->Get_all('news');