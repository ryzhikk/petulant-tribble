<!DOCTYPE html>
<html>
<head>
    <title>Новости</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="../css.css"/>
</head>
<body>
    <h1><?php echo htmlspecialchars_decode($this->data->name, ENT_QUOTES); ?></h1>
    <p>
        <?php echo htmlspecialchars_decode($this->data->content, ENT_QUOTES); ?>
        <br>
        Дата добавления: <?php echo $this->data->time; ?>
    </p>
    <a href="/index.php?id=<?php echo $_GET['id']?>&&act=Edit&&ctrl=Admin">Редактировать новость</a>
    <br>
    <a href="/index.php">Назад</a>

</body>
</html>