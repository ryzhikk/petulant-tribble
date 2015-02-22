<?php



class C_config {

    public $hostName;
    public $mysqlLogin;
    public $mysqlPass;
    public $dbName;
    public $table_news;

    public function  __construct() {
        require __DIR__ . '/../config.php';
        $this->hostName = $arrConfig['hostName'];
        $this->mysqlLogin = $arrConfig['mysqlLogin'];
        $this->mysqlPass = $arrConfig['mysqlPass'];
        $this->dbName = $arrConfig['dbName'];
        $this->table_news = $arrConfig['table_news'];
    }
}


class Sql_query {

    public function __construct() {
        $config = new C_config();
        mysql_connect($config->hostName, $config->mysqlLogin, $config->mysqlPass);
        mysql_select_db($config->dbName);
    }

    public function Get_all($table) {
        $res = mysql_query("SELECT * FROM " . $table . " ORDER BY time DESC");
        while (false !== $row = mysql_fetch_assoc($res)) {
            $ret[] = $row;
        }
        return $ret;
    }

    public function Get_one_line($table, $id) {
        $res = mysql_query("SELECT * FROM " . $table . " WHERE id='" . $id . "'");
        while (false !== $row = mysql_fetch_assoc($res)) {
            $ret[] = $row;
        }
        return $ret;
    }

    public function Add_new($table, $name, $content) {
        return mysql_query("INSERT INTO " . $table . " (name, content) VALUES ('" . $name . "', '" . $content . "')");
    }

    public function Update_news($table, $id, $name, $content) {

        return mysql_query("UPDATE " / $table ." SET name='" . $name . "', content='" . $content . "' WHERE id='" . $id . "'");
    }

}