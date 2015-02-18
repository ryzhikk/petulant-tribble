<!DOCTYPE html>
<html>
<head>

    <title>Новости</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="css.css"/>
</head>
<body>
    <h1>Новости</h1>
    <?php
        foreach($news as $new){ ?>
            <a href="/new.php/?id=<?php echo $new['id']; ?>"><h3><?php echo $new['name']; ?></h3></a>
            <p><?php echo $new['content']; ?></p>
    <?php
        }
    ?>
</body>
</html>