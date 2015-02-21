<?php

abstract class Article {
    public $name;
    public $content;
    public $id;
    public $time;

    abstract public function Get_all_article();
    abstract public function Get_one_article();
    abstract public function Add_new_article();
}