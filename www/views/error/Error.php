<?php
   switch ($exeption) {
        case 'E404Exeption':
            header('HTTP/1.0 404 Not Found');
            break;
        case 'PDOExeption':
            header('HTTP/1.0 403 Forbidden');
            break;
    }
?>

<!DOCTYPE html>
<html>
<head>

    <title>Ошибка</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="../css.css"/>
</head>
<body>
<style>
    div {
        text-align: center;
    }
</style>
<div>
    <h1>Ошибка!</h1>
    <p><?php echo $error, $code; ?></p>
</div>
</body>
</html>