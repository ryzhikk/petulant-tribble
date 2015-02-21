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

$get_list_news = new News();
$news = $get_list_news->Get_all_article();
