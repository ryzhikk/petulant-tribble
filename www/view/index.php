<!DOCTYPE html>
<html>
<head>

    <title>Новости</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="css.css"/>
</head>
<body>
    <?php if ($add){ ?>
    <p>Новость успешно добавлена!</p>
    <?php } ?>
    <h1>Новости</h1>
    <form action="add_new.php" method="post">
        <input type="submit" name="addNew" value="Добавить новость">
    </form>
    <?php
        foreach($news as $new){ ?>
            <a href="/new.php/?id=<?php echo $new['id']; ?>"><strong><?php echo htmlspecialchars_decode($new['name'], ENT_QUOTES); ?></strong></a>
            <p>
                <?php echo htmlspecialchars_decode($new['content'], ENT_QUOTES); ?>
                <br>
                Дата добавления: <?php echo $new['time']; ?>
            </p>

    <?php
        }
    ?>
</body>
</html>