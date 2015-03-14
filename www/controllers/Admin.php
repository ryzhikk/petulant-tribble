<?php

    namespace App\Controllers;
    use App\Models\News as NewsModel;

    class Admin
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

                $objNews = new NewsModel;
                $objNews->name = htmlspecialchars($_POST['name'], ENT_QUOTES);
                $objNews->content = htmlspecialchars($_POST['content'], ENT_QUOTES);
                #var_dump($this->name); die;
                if ($objNews->SaveArticle())
                {
                    #setcookie('add', 'news', time()+3600);
                    header('Location: /news/one?id=' . $objNews->id);
                }
                else
                {
                    return 'error!';
                }
            }
            else
            {
                $view = new \View();
                $view->display($this->act, NewsModel::$sqlTable);
                #var_dump($_SESSION);
            }
        }

        public function actionEdit()
        {
            if (!empty ($_POST['edit']))
            {
                $objNews = new NewsModel();
                $objNews->id = $_GET['id'];
                $objNews->name = htmlspecialchars($_POST['name'], ENT_QUOTES);
                $objNews->content = htmlspecialchars($_POST['content'], ENT_QUOTES);
                if ($objNews->SaveArticle())
                {
                    #setcookie('edit', 'news', time()+3600);
                    header ('Location: /news/one?id=' . $objNews->id);
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
                    $showOne = new News($this->act);
                    $showOne->actionOne();
                }
                else
                {
                    throw new \E404Exeption('Неизвестная ошибка!');
                }
            }
        }

        public function actionDel()
        {
            if ($_GET['id'])
            {
                $objNews = new NewsModel();
                $objNews->id = $_GET['id'];
                if ($objNews->Delete())
                {
                    header('Location: /');
                }
            }
            else
            {
                throw new \E404Exeption('Удаление не удалось.');
            }
        }

        public function actionLogsError()
        {
            $logs = \LogsError::readErrorLog();
            $view = new \View();
            $view->logs = $logs;
            $view->display($this->act, 'error');
        }
    }