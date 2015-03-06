<!DOCTYPE html>
<html>
<head>
    <title>Новости</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="../css.css"/>
</head>
<body>
    <?php #var_dump($news); die; ?>
    <h1><?php echo htmlspecialchars_decode($news->name, ENT_QUOTES); ?></h1>
    <p>
        <?php echo htmlspecialchars_decode($news->content, ENT_QUOTES); ?>
        <br>
        Дата добавления: <?php echo $news->time; ?>
    </p>
    <a href="/index.php?id=<?php echo $_GET['id']?>&&act=Edit&&ctrl=Admin">Редактировать новость</a>
    <br>
    <a href="/index.php">На главную</a>

</body>
</html>