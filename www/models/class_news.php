<?php
require __DIR__ . '/class_article.php';
require __DIR__ . '/class_bd.php';

class News extends Article {
    public $table;

    public function __construct() {
        $this->sql_object = new Sql_query();
    }

    public function Get_all_article() {

        $news = $this->sql_object->Get_all('news');
        return $news;
    }

    public function Get_one_article() {

        $new = $this->sql_object->Get_one_line('news', $this->id);
        return $new;
    }

    public function Add_new_article() {
        $add_name = htmlspecialchars($_POST['name'], ENT_QUOTES);
        $add_content = htmlspecialchars($_POST['content'], ENT_QUOTES);
        return $this->sql_object->Add_new($add_name, $add_content);
    }

    public function Update_article() {

    }

}