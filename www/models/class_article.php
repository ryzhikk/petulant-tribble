<?php
require __DIR__ . '/class_bd.php';

abstract class Article {
    public $name;
    public $content;
    public $id;
    public $time;
    public $sql_object;
    public $sql_table;

    abstract public function Get_all_article();
    abstract public function Get_one_article();
    abstract public function Add_new_article();
    abstract public function Update_article();
}