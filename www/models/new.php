 <?php
   /* require __DIR__ . '/../functions/sql.php';

    function New_setNew($id)
    {
        $query = "SELECT * FROM news WHERE id='" . $id . "'";
        $newArr = sql_query($query);

        return $newArr;
    }    */



    require __DIR__ . '/class_news.php';

    $get_new = new News();
    $get_new->id = $_GET['id'];
    $new = $get_new->Get_one_article();