<?php


abstract class AbstractArticle
{
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
        $db = new DB();
        $db->SetClassName($class);
        return $db->Query($sql);
    }

    public function GetOneArticleByPk()
    {
        $class = get_called_class();
        $sql = "SELECT * FROM " . static::$sqlTable . " WHERE id=:id";
        $db = new DB();
        $db->SetClassName($class);
        return $db->Query($sql, [':id' => $this->id])[0];
    }

    public static  function GetOneArticleByColumn($column, $value)
    {
        $class = get_called_class();
        $sql = "SELECT * FROM " . static::$sqlTable . " WHERE " . $column . "=:value";
        $db = new DB();
        #var_dump([':' . $column => $value]); die;
        $db->SetClassName($class);
        return $db->Query($sql, [':value' => $value]);
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

        $query = new DB();
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
        /**
         *  Массив подстановок полей таблицы в шаблон запроса в базу
         */
        #$cols = array_keys($this->data);

        $cols = [];
        foreach ($this->data as $key => $value)
        {
            $cols[$key] = ':' . $key;
        }

        /**
         * $data - Переменная с подстановками имён и значений полей для запроса в базу
         */
        $data = implode(', ', array_map(function($k, $v)
                                        {
                                              return   $k . '=' . $v;
                                        },
                                        array_keys($cols), array_values($cols)));

        /**
         * $valuesOfFields - Массив со значениями полей
         * Его ключи - подстановки для значений полей в шаблоне запроса
         */
        $valuesOfFields = [];
        foreach ($cols as $key => $val)
        {
            $valuesOfFields[$val] = $this->data[$key];
        }

        #$class = get_called_class();
        $sql =
            "UPDATE " . static::$sqlTable . " SET "
            . $data .
            " WHERE id='" . $this->id . "'";

        #var_dump($sql); die;

        $query = new DB ();
        return $query->Execute($sql, $valuesOfFields);
    }

}