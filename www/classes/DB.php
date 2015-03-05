<?php

    class DB
    {
        private $dbh;
        private $className = 'StdClass';

        public function __construct()
        {
            $config = new CConfig();

            $sdn = 'mysql:dbname=' . $config->dbName . ';host=' . $config->hostName;
            $this->dbh = new PDO($sdn, $config->mysqlLogin, $config->mysqlPass);
        }

        public function SetClassName($className)
        {
            $this->className = $className;
        }

        public function Query($sql, $params = [])
        {
            $sth = $this->dbh->prepare($sql);
            $sth->execute($params);
            return $sth->fetchAll(PDO::FETCH_CLASS, $this->className);
        }

        public function Execute($sql, $params = [])
        {
            $sth = $this->dbh->prepare($sql);
            return $sth->execute($params);
        }

        /*
        public function GetAll($table, $class = 'stdClass')
        {
            $res = mysql_query("SELECT * FROM " . $table . " ORDER BY time DESC");
            while (false !== $row = mysql_fetch_object($res, $class)) {
                $ret[] = $row;
            }
            return $ret;
        }

        public function GetOne($table, $id, $class = 'stdClass')
        {
            $res = mysql_query("SELECT * FROM " . $table . " WHERE id='" . $id . "'");
            while (false !== $row = mysql_fetch_object($res, $class)) {
                $ret[] = $row;
            }
            return $ret[0];
        }

        public function AddNew($table, $name, $content)
        {
            return mysql_query("INSERT INTO " . $table . " (name, content) VALUES ('" . $name . "', '" . $content . "')");
        }

        public function EditOne($table, $id, $name, $content)
        {
            return mysql_query("UPDATE " . $table . " SET name='" . $name . "', content='" . $content . "' WHERE id='" . $id . "'");
        }
        */
    }