<!DOCTYPE html>
<html>
<head>
    <title>Новости</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="../css.css"/>
</head>
<body>
    <?php var_dump($new); ?>
    <h1><?php echo htmlspecialchars_decode($new->name, ENT_QUOTES); ?></h1>
    <p>
        <?php echo htmlspecialchars_decode($new->content, ENT_QUOTES); ?>
        <br>
        Дата добавления: <?php echo $new->time; ?>
    </p>
    <a href="/index.php?id=<?php echo $_GET['id']?>&&act=Edit">Редактировать новость</a>
    <br>
    <a href="/index.php">Назад</a>

</body>
</html>