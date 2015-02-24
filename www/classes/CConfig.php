<?php

    class CConfig {

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
