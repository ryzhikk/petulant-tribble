<?php
    #error_reporting(E_ALL);
    require_once __DIR__ . '/autoload.php';
    require __DIR__ . '/const.php';

    /* $add = $_COOKIE['add'];
    setcookie('add', '', time() - 3600);
    $edit = $_COOKIE['edit'];
    setcookie('edit', '', time() - 3600); */

    $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $pathParts = explode('/', $path);
    #var_dump($pathParts); die;

    $ctrl = !empty($pathParts[1]) ? ucfirst($pathParts[1]) : 'News';
    $act = !empty($pathParts[2]) ? ucfirst($pathParts[2]) : 'All';

    #$ctrl = isset($_GET['ctrl']) ? $_GET['ctrl'] : 'News';
    #$act = isset($_GET['act']) ? $_GET['act'] : 'All';

    $controllerClassName = 'App\\Controllers\\' . $ctrl;
    #var_dump($controllerClassName); die;

    try
    {
    $controller = new $controllerClassName($act);
    $method = 'action' . $act;
    $controller->$method();
    }
    catch (\E404Exeption $e)
    {
        $view = new \View();
        $view->error = $e->getMessage();
        $view->exeption = 'E404Exeption';

        $mail = new \Mailer;
        $view->reportMail = $mail->SendMail($e->getMessage());
        $view->display('Error', 'error');
    }
    catch (\E403Exeption $e) {
        $view = new \View();
        $view->error = 'Error 403. Forbidden';
        $view->exeption = 'PDOException';

        $error = new \LogsError();
        $error->recordErrorLog($e->getMessage());

        $mail = new \Mailer;
        $view->reportMail = $mail->SendMail($e->getMessage());
        $view->display('Error', 'error');
        die;
    }


    /*
    1. Повторите код, который был написан на уроке.
    Обратите внимание на использование PDO в классе DB,
    особое внимание - на класс абстрактной модели и наследование
    от нее модели новостей.

2. Расширьте абстрактную модель. Добавьте метод ::findByColumn($column,
    $value) - поиск в таблице записей с заданным значением заданного поля.

3. Улучшите метод ->insert(). Сделайте так, чтобы после успешного
    сохранения устанавливалось поле $id модели.

4. Напишите метод ->update(), который будет обновлять данные в уже
    существующей записи.

5. Создайте метод ->delete()

6. Перепишите админ-контроллер новостей, используя новые модели.

7*. Превратите методы ->insert() и ->update() в защищенные. Создайте
    единый публичный метод ->save(), который будет вызывать один из
    них в зависимости от того, "новая" ли модель или ранее уже такая
    запись существовала в БД.

    Продолжаем работать над своим приложением с новостями.


1. Создайте свой класс исключений E404Ecxeption. Выбрасывайте это исключение в контроллерах, в том случае,
    когда искомый объект не найден. Ловите во фронт-контроллере, а поймав - показывайте пользователю
    страничку с ошибкой 404 и текстом ошибки.

2. Не забудьте перед показом страницы 404 отправить соответствующий заголовок с кодом ответа HTTP 404

3. Следующий шаг - изучите исключения PDO и настройки, связанные с ними. В случае ошибки соединения
    с базой данных или ошибки в запросе ловите соответствующее исключение, показывайте пользователю
    страницу 403, аналогично такой же 404.

4. Создайте класс для логирования событий. Объект этого класса должен уметь записать информацию о
    событии (время, место возникновения, сообщение об ошибке) в лог (текстовый файл). Подсказка -
    посмотрите на класс ErrorException. Примените логирование к ошибкам PDO.

5. Предусмотрите в админ-панели просмотр файла лога ошибок.
    */