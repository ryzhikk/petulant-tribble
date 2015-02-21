<?php

require __DIR__ . '/class_news.php';

$get_list_news = new News();
$news = $get_list_news->Get_all_article();
