<?php

if (!empty ($_POST['send_new'])) {
    require __DIR__ . '/../functions/sql.php';

    $add_name = $_POST['name'];
    $add_content = $_POST['content'];

    $add_query = "INSERT INTO news (name, content) VALUES ('" . $add_name . "', '" . $add_content . "')";

    if (sql_downloader($add_query)) {
        setcookie('add', 'new', time()+3600);
        header ('Location: /index.php');
    }
}