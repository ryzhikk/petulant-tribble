<?php
    require __DIR__ . '/../functions/sql.php';

    function New_setNew($id)
    {
        $query = "SELECT * FROM news WHERE id='" . $id . "'";
        $newArr = sql_query($query);

        return $newArr;
    }