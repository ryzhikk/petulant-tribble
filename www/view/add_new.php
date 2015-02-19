<!DOCTYPE html>
<html>
<head>

    <title>Новости</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="css.css"/>
</head>
<body>
    <form action="" method="post">
        <h4>Добавить новость</h4>
        <label>
            <p>Введите заголовок новости</p>
            <input type="text" name="name" required>
        </label>
        <label>
            <p>Введите текст новости</p>
            <input type="text" name="content" required>
            <br>
            <input type="submit" name="send_new" value="Отправить">
            <input type="reset" value="Сбросить">
        </label>
    </form>
    <a href="/index.php">Вернуться на главную</a>
</body>
</html>