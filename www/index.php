<?php
require_once __DIR__ . '/autoload.php';

$add = $_COOKIE['add'];
setcookie('add', '', time()-3600);

$edit = $_COOKIE['edit'];
    #var_dump($edit); die;
setcookie('edit', '', time()-3600);

    $ctrl = isset($_GET['ctrl']) ? $_GET['ctrl'] : 'News';
    $act = isset($_GET['act']) ? $_GET['act'] : 'All';

    $controllerClassName = $ctrl . 'Controller';
    $controller = new $controllerClassName($act);

    $method = 'action' . $act;
    $controller->$method();


/*
Домашнее задание

1. Разработайте структуру вашего приложения в файловой системе.
Определите, какие папки у вас будут (например - controllers, models, views),
как будут называться классы. В соответствии с этой структурой напишите автозагрузку
для своих классов.

2. Создайте фронт-контроллер, как показано на уроке. Превратите свои контроллеры
в классы с методами-actions. Не забудьте везде, где необходимо, изменить ссылки!

3. Создайте два контроллера - NewsController для показа списка всех новостей и
одной выбранной новости и AdminController для управления новостями (достаточно
пока реализовать добавление новости в базу)

4. Подумайте, как можно применить объектно-ориентированный подход во views? Например
так:
$views = new View(); // создали объект
$views->data('news', $items); // передали данные для показа
$views->display('allnews.php'); // дали команду на показ шаблона с указанными ранее
данными

5* Самостоятельно изучите вопрос - как превратить адреса вида ?ctrl=News&act=All
в "красивые" вида /news/all
*/