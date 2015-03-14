<?php
    namespace App\Controllers;
    use App\Models\News as NewsModel;

class News
{
    public $act;

    public function __construct($actDir)
    {
        $this->act = $actDir;
    }

    public function actionAll()
    {
        #var_dump($_SERVER); die;
        try {$news = NewsModel::GetAllArticle();
            if (false == $news)
            {
                throw new \E404Exeption;
            }
            else
            {
                $view = new \View();
                $view->news = $news;
                $view->display($this->act, NewsModel::$sqlTable);
            }
        }
        catch (\E403Exeption $e) {
            $view = new \View();
            $view->error = 'Error 403. Forbidden';
            $view->exeption = 'PDOException';
            $view->display('Error', 'error');

            $error = new \LogsError();
            $error->recordErrorLog($e->getMessage());
            die;
        }
    }

    public function actionOne()
    {
        if (!empty ($_GET['id']))
        {
            $objNews = new NewsModel();
            $objNews->id = $_GET['id'];
            try {
                $news = $objNews->GetOneArticleByPk();
                #var_dump($news); die;
                if (false == $news)
                {
                    throw new \E404Exeption('Такой новости не найдено!');
                }
                else
                {
                    $view = new \View();
                    $view->news = $news;
                    $view->display($this->act, NewsModel::$sqlTable);
                }
            }
            catch (\E403Exeption $e) {
                $view = new \View();
                $view->error = 'Error 403. Forbidden';
                $view->exeption = 'PDOException';
                $view->display('Error', 'error');

                $error = new \LogsError();
                $error->recordErrorLog($e->getMessage());
                die;
            }
        }

        else
        {
            throw new \E404Exeption;
        }
    }

    public function actionSearch ()
    {
        #var_dump($_GET);
        try {
            $news = NewsModel::GetOneArticleByColumn($_GET['nameOfColumn'], $_GET['text']);
            if (false == $news)
            {
                throw new \E404Exeption('Совпадений не найдено!');
            }
            else
            {
                $view = new \View();
                $view->news = $news;
                #var_dump($news); die;
                $view->display($this->act, NewsModel::$sqlTable);
            }
        }
        catch (\E403Exeption $e) {
            $view = new \View();
            $view->error = 'Error 403. Forbidden';
            $view->exeption = 'PDOException';
            $view->display('Error', 'error');

            $error = new \LogsError();
            $error->recordErrorLog($e->getMessage());
            die;
        }
    }

}


