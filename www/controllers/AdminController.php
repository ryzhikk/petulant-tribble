<?php

    class AdminController
    {

        public $act;

        public function __construct($actDir)
        {
            $this->act = $actDir;
        }

        public function actionAdd()
        {
            require __DIR__ . '/../functions/session.php';

            if (!empty ($_POST['send_new'])) {

                $upload_news = new News();

                if (News::AddNewArticle()) {
                    setcookie('add', 'new', time()+3600);
                    header ('Location: /index.php');
                }

                else {
                    echo 'Ошибка!';
                }
            }
            $view = new View();
            $view->display(News::$sql_table, $this->act);
            var_dump($_SESSION);

        }

        public function actionEdit()
        {
            $view = new View();
            $view->display(News::$sql_table, $this->act);

        }
    }