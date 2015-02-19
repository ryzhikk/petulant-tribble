<!DOCTYPE html>
<html>
<head>
    <title>Новости</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="css.css"/>
</head>
<body>
    <h1><?php echo htmlspecialchars_decode($new[0]['name'], ENT_QUOTES); ?></h1>
    <p>
        <?php echo htmlspecialchars_decode($new[0]['content'], ENT_QUOTES); ?>
        <br>
        Дата добавления: <?php echo $new[0]['time']; ?>
    </p>
    <a href="/index.php">Назад</a>

</body>
</html>