<?php
require __DIR__ . '/../classes/AbstractArticle.php';

    class News
        extends AbstractArticle
    {
        /*
        public $name;
        public $content;
        public $time;
        */
        protected static $class = 'News';
        public static $sqlTable = 'news';


    }