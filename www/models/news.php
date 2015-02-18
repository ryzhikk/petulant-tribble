<?php
require __DIR__ . '/functions/sql.php';

function Photo_getAll()
{
    $query = 'SELECT * FROM news';
    $newsArr = sql_query($query);
}