<?php
require __DIR__ . '/AbstractArticle.php';

class News extends AbstractArticle {

    protected static $class = 'News';
    protected static $sql_table = 'news';
    protected static  $sql_object;

}