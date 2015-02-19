<?php

function sql_connect()
{
    mysql_connect('test', 'root');
    mysql_select_db('commom_database');
}

function sql_query($query)
{
    sql_connect();
    $res = mysql_query($query);

    while (false !== $row = mysql_fetch_assoc($res)){
        $ret[] = $row;
    }

    return $ret;
}

function sql_downloader($query)
{
    sql_connect();
    return mysql_query($query);
}