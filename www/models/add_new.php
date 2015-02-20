<?php

    require __DIR__ . '/../functions/sql.php';

    $add_name = htmlspecialchars($_POST['name'], ENT_QUOTES);
    $add_content = htmlspecialchars($_POST['content'], ENT_QUOTES);

    $add_query = "INSERT INTO news (name, content) VALUES ('" . $add_name . "', '" . $add_content . "')";

    if (sql_uploader($add_query)) {
        setcookie('add', 'new', time()+3600);
        header ('Location: /index.php');
    }
