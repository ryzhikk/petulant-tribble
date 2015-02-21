<?php
require __DIR__ . '/class_article.php';

class News extends Article {
    public $table;

    public function Get_all_article() {
        require __DIR__ . '/class_bd.php';

        $listNews = new Sql_query();

        $news = $listNews->Get_all('news');
        return $news;
    }

    public function Get_one_article() {
        require __DIR__ . '/class_bd.php';
        $setNews = new Sql_query();
        $new = $setNews->Get_one_line('news', $this->id);
        return $new;
    }

    public function Add_new_article() {

    }
}