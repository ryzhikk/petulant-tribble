<?php
require __DIR__ . '/SqlQuery.php';

abstract class AbstractArticle {
    public $name;
    public $content;
    public $id;
    public $time;
    protected static $sql_object;
    protected static $sql_table;
    protected static  $class;

    public static  function GetAllArticle() {
        $query = new SqlQuery();
        return $query->GetAll(static::$sql_table, static::$class);
    }
    public function GetOneArticle()
    {
        $query = new SqlQuery();
        return $query->GetOne(static::$sql_table, $this->id, static::$class);
    }
    public static function AddNewArticle()
    {
        $query = new SqlQuery();
        $add_name = htmlspecialchars($_POST['name'], ENT_QUOTES);
        $add_content = htmlspecialchars($_POST['content'], ENT_QUOTES);
        return $query->AddNew(static::$sql_table, $add_name, $add_content);
    }
    public function UpdateArticle()
    {
        $query = new SqlQuery();
        $update_name = htmlspecialchars($_POST['name'], ENT_QUOTES);
        $update_content = htmlspecialchars($_POST['content'], ENT_QUOTES);
        return $query->UpdateOne (static::$sql_table, $this->id, $update_name, $update_content);
    }
}