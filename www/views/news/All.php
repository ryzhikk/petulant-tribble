<!DOCTYPE html>
<html>
<head>

    <title>Новости</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="../css.css"/>
</head>
<body>
    <?php if ($add): ?>
        <p>Новость успешно добавлена!</p>
    <?php endif;
    if ($edit):?>
        <p>Новость успешно отредактирована!</p>
    <?php endif ?>
    <div>

        <form action="/index.php" method="get">
            <label>Поиск по названию новостей
                <input type="hidden" name="act" value="Search">
                <input type="text" name="text">
                <input type="submit" name="nameOfColumn" value="title">
            </label>
        </form>
    </div>
    <h1>Новости</h1>
    <form action="/index.php?act=Add&&ctrl=Admin" method="post">
        <input type="submit" name="addNew" value="Добавить новость">
    </form>
    <?php
        #var_dump($news); die;
        foreach($news as $new){ ?>
            <a href="/index.php/?id=<?php echo $new->id; ?>&&act=One">
                <strong><?php echo htmlspecialchars_decode($new->name, ENT_QUOTES); ?></strong>
            </a>
            <p>
                <?php echo htmlspecialchars_decode($new->content, ENT_QUOTES); ?>
                <br>
                Дата добавления: <?php echo $new->time; ?>
            </p>

    <?php
        }
    ?>
</body>
</html>