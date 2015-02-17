<?php

function sql_connect()
{
    mysql_connect('test', 'root');
    mysql_select_db('commom_database');
}