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

            if (!empty ($_POST['send_new']))
            {

                $objNews = new News;
                $objNews->name = htmlspecialchars($_POST['name'], ENT_QUOTES);
                $objNews->content = htmlspecialchars($_POST['content'], ENT_QUOTES);

                #var_dump($this->name); die;

                if ($objNews->SaveArticle())
                {
                    #setcookie('add', 'news', time()+3600);
                    header('Location: /index.php?act=One&&id=' . $objNews->id);
                }
                else
                {
                    return 'error!';
                }
            }
            else
            {
                $view = new View();
                $view->display($this->act, News::$sqlTable);
                #var_dump($_SESSION);
            }
        }

        public function actionEdit()
        {
            if (!empty ($_POST['edit']))
            {
                $objNews = new News();
                $objNews->id = $_GET['id'];
                $objNews->name = htmlspecialchars($_POST['name'], ENT_QUOTES);
                $objNews->content = htmlspecialchars($_POST['content'], ENT_QUOTES);
                if ($objNews->SaveArticle())
                {
                    #setcookie('edit', 'news', time()+3600);
                    header ('Location: /index.php?act=One&&id=' . $objNews->id);
                }
                else
                {
                    return 'error!';
                }
            }
            else
            {
                if (!empty ($_GET['id']))
                {
                    $showOne = new NewsController($this->act);
                    $showOne->actionOne();

                }
                else
                {
                    throw new E404Exeption('Неизвестная ошибка.');
                }
            }
        }

        public function actionDel()
        {
            if ($_GET['id'])
            {
                $objNews = new News();
                $objNews->id = $_GET['id'];
                if ($objNews->Delete())
                {
                    header('Location: /');
                }
            }
            else
            {
                return 'error!';
            }
        }
    }