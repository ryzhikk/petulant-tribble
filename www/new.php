<?php
if (!empty ($_GET['id'])) {
    $idNew = $_GET['id'];
    require __DIR__ . '/models/new.php';

    $new = New_setNew($idNew);

    require __DIR__ . '/view/new.php';
}