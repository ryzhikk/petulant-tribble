<!DOCTYPE html>
<html>
<head>

    <title>Новости</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="../css.css"/>
</head>
<body>
<div>

    <form action="/index.php" method="get">
        <label>Поиск по новостям
            <input type="hidden" name="act" value="Search">
            <input type="text" name="search">
            <input type="submit" name="search" value="Поиск">
        </label>
    </form>
</div>
<h4>Результаты поиска</h4>
<?php
    #var_dump($news); die;
    foreach($news as $new){ ?>
        <a href="/News/One?id=<?php echo $new->id; ?>">
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