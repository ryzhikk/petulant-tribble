<!DOCTYPE html>
<html>
<head>

    <title>Новости</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="/view/css.css"/>
</head>
<body>
    <fieldset>
        <legend>Добавить новость</legend>
            <form action="" method="post">
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
     </fieldset>
    <a href="/index.php">Вернуться на главную</a>
</body>
</html>