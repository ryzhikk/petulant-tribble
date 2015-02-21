<?php

abstract class Article {
    public $name;
    public $content;
    public $id;
    public $time;
    public $sql_object;

    abstract public function Get_all_article();
    abstract public function Get_one_article();
    abstract public function Add_new_article();
    abstract public function Update_article();
}