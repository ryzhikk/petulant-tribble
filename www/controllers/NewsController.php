<?php

class NewsController
{
    public $act;

    public function __construct($actDir)
    {
        $this->act = $actDir;
    }

    public function actionAll()
    {
        #var_dump($_SERVER); die;
        try {$news = News::GetAllArticle();
            if (false == $news)
            {
                throw new E404Exeption;
            }
            else
            {
                $view = new View();
                $view->news = $news;
                $view->display($this->act, News::$sqlTable);
            }
        }
        catch (E403Exeption $e) {
            $view = new View();
            $view->error = 'Error 403. Forbidden';
            $view->exeption = 'PDOException';
            $view->display('Error', 'error');

            $error = new LogsError();
            $error->recordErrorLog($e->getMessage());
            die;
        }
    }

    public function actionOne()
    {
        if (!empty ($_GET['id']))
        {
            $objNews = new News();
            $objNews->id = $_GET['id'];
            try {
                $news = $objNews->GetOneArticleByPk();
                #var_dump($news); die;
                if (false == $news)
                {
                    throw new E404Exeption('Такой новости не найдено!');
                }
                else
                {
                    $view = new View();
                    $view->news = $news;
                    $view->display($this->act, News::$sqlTable);
                }
            }
            catch (E403Exeption $e) {
                $view = new View();
                $view->error = 'Error 403. Forbidden';
                $view->exeption = 'PDOException';
                $view->display('Error', 'error');

                $error = new LogsError();
                $error->recordErrorLog($e->getMessage());
                die;
            }
        }

        else
        {
            throw new E404Exeption;
        }
    }

    public function actionSearch ()
    {
        #var_dump($_GET);
        try {
            $news = News::GetOneArticleByColumn($_GET['nameOfColumn'], $_GET['text']);
            if (false == $news)
            {
                throw new E404Exeption('Совпадений не найдено!');
            }
            else
            {
                $view = new View();
                $view->news = $news;
                #var_dump($news); die;
                $view->display($this->act, News::$sqlTable);
            }
        }
        catch (E403Exeption $e) {
            $view = new View();
            $view->error = 'Error 403. Forbidden';
            $view->exeption = 'PDOException';
            $view->display('Error', 'error');

            $error = new LogsError();
            $error->recordErrorLog($e->getMessage());
            die;
        }
    }

}


