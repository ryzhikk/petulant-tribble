 <?php
   /* require __DIR__ . '/../functions/sql.php';

    function New_setNew($id)
    {
        $query = "SELECT * FROM news WHERE id='" . $id . "'";
        $newArr = sql_query($query);

        return $newArr;
    }    */



    require __DIR__ . '/class_news.php';
    require __DIR__ . '/class_bd.php';

    $new = new News();
    $new->id = $_GET['id'];

    $setNews = new Sql_query();