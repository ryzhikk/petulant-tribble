<?php
require __DIR__ . '/../classes/AbstractArticle.php';

class News extends AbstractArticle {

    protected static $class = 'News';
    public static $sql_table = 'news';

}