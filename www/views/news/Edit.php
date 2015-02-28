<!DOCTYPE html>
<html>
<head>
    <title>Новости</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="/views/css.css">
</head>
<body>
    <fieldset>
        <legend>Редактирование новости</legend>
        <form action="" method="post">
            <label>
                Заголовок
                <br>
                <input type="text" name="name" value="<?php echo $news->name ?>">
                <br>
            </label>
            <label>
                Содержание новости
                <br>
                <textarea name="content"><?php echo $news->content ?></textarea>
                <input type="submit" name="edit" value="Редактировать">
            </label>
        </form>
        <a href="/index.php?id=<?php echo $_GET['id'] ?>&&act=One">Назад</a>
    </fieldset>

</body>
</html>