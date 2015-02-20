<?php
if (!empty ($_GET['id'])) {
    require __DIR__ . '/models/new.php';


    ###$idNew = $_GET['id'];
    ###$new = New_setNew($idNew);

    $new = $setNews->Get_one_news('news', $new->id);

    require __DIR__ . '/view/new.php';
}