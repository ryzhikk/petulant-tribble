<?php
require __DIR__ . '/../functions/sql.php';

    function News_getAll()
    {
        $query = "SELECT * FROM news";
        $newsArr = sql_query($query);
        return $newsArr;
    }