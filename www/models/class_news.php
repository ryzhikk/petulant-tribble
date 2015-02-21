<?php
require __DIR__ . '/class_article.php';

class News extends Article {

    public function __construct() {
        $this->sql_object = new Sql_query();
        $this->sql_table = new C_config();

    }

    public function Get_all_article() {

        $news = $this->sql_object->Get_all($this->sql_table->table_news);
        return $news;
    }

    public function Get_one_article() {

        $new = $this->sql_object->Get_one_line($this->sql_table->table_news, $this->id);
        return $new;
    }

    public function Add_new_article() {
        $add_name = htmlspecialchars($_POST['name'], ENT_QUOTES);
        $add_content = htmlspecialchars($_POST['content'], ENT_QUOTES);
        return $this->sql_object->Add_new($this->sql_table->table_news, $add_name, $add_content);
    }

    public function Update_article() {

    }

}