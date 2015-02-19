<?php

require __DIR__ . '/functions/session.php';

if (!empty ($_POST['send_new'])) {
    require __DIR__ . '/models/add_new.php';
}

require __DIR__ . '/view/add_new.php';
var_dump($_SESSION);

