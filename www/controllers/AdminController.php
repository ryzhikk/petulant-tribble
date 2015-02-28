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


                if (News::AddNewArticle()) {
                    setcookie('add', 'news', time()+3600);
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
            if (!empty ($_POST['edit']))
            {
                $editOne = new News();
                $editOne->id = $_GET['id'];
                if ($editOne->EditArticle())
                {
                    setcookie('edit', 'news', time()+3600);
                    header ('Location: /index.php');
                }
            }
            if (!empty ($_GET['id']))
            {
                $showOne = new NewsController($this->act);
                $showOne->actionOne();

            }
        }
    }