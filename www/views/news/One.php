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
    <a href="/index.php?ctrl=Admin&&act=Edit&&id=<?php echo $news->id ?>">Редактировать новость</a>
    <br>
    <a href="/index.php?ctrl=Admin&&act=Del&&id=<?php echo $news->id ?>">Удалить</a>
    <br>
    <a href="/index.php">На главную</a>

</body>
</html>