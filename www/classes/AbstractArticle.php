<?php


abstract class AbstractArticle
{
    public $id;
    protected static $sqlTable;
    protected static  $class;
    /**
     * @var array со всякими данными для запроса в базу данных
     */
    protected $data = [];


    public function __set($k, $v)
    {
        $this->data[$k] = $v;
    }

    public  function  __get($k)
    {
        return $this->data[$k];
    }

    public static function GetAllArticle()
    {
        $class = get_called_class();
        $sql = "SELECT * FROM " . static::$sqlTable;
        $db = new SqlQuery();
        $db->SetClassName($class);
        return $db->Query($sql);
    }

    public function GetOneArticleByPk()
    {
        $class = get_called_class();
        $sql = "SELECT * FROM " . static::$sqlTable . " WHERE id=:id";
        $db = new SqlQuery();
        $db->SetClassName($class);
        return $db->Query($sql, [':id' => $this->id])[0];
    }

    public function InsertArticle()
    {
        /**
         *  Массив полей таблицы в шаблон запроса в базу
         */
        $cols = array_keys($this->data);

        /**
         * $data - Массив со значениями полей
         * Его ключи - подстановки для значений полей в шаблоне запроса
         */
        $data = [];
        foreach ($cols as $col)
        {
            $data[':' . $col] = $this->data[$col];
        }

        $query = new SqlQuery();
        $sql =
            "INSERT INTO " . static::$sqlTable . "
            (" . implode(', ', $cols) . ")
            VALUES
            (" . implode(', ', array_keys($data)) . ")";

        #var_dump($sql); die;

        return $query->Execute($sql, $data);
    }

    public function UpdateArticle()
    {
        $query = new SqlQuery();
        $update_name = htmlspecialchars($_POST['name'], ENT_QUOTES);
        $update_content = htmlspecialchars($_POST['content'], ENT_QUOTES);
        return $query->EditOne (static::$sqlTable, $this->id, $update_name, $update_content);
    }
}