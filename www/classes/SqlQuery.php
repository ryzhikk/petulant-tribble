<?php

require_once __DIR__ . '/CConfig.php';

class SqlQuery {

    public function __construct() {
        $config = new CConfig();
        mysql_connect($config->hostName, $config->mysqlLogin, $config->mysqlPass);
        mysql_select_db($config->dbName);
    }

    public function GetAll($table, $class = 'stdClass') {
        $res = mysql_query("SELECT * FROM " . $table . " ORDER BY time DESC");
        while (false !== $row = mysql_fetch_object($res, $class)) {
            $ret[] = $row;
        }
        return $ret;
    }

    public function GetOne($table, $id, $class = 'stdClass') {
        $res = mysql_query("SELECT * FROM " . $table . " WHERE id='" . $id . "'");
        while (false !== $row = mysql_fetch_object($res, $class)) {
            $ret[] = $row;
        }
        return $ret;
    }

    public function AddNew($table, $name, $content) {
        return mysql_query("INSERT INTO " . $table . " (name, content) VALUES ('" . $name . "', '" . $content . "')");
    }

    public function UpdateOne($table, $id, $name, $content) {

        return mysql_query("UPDATE " / $table ." SET name='" . $name . "', content='" . $content . "' WHERE id='" . $id . "'");
    }

}