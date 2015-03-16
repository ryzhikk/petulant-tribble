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
        $news = NewsModel::GetAllArticle();
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

    public function actionOne()
    {
        if (!empty ($_GET['id'])) {
            $objNews = new NewsModel();
            $objNews->id = $_GET['id'];

            $news = $objNews->GetOneArticleByPk();
            #var_dump($news); die;
            if (false == $news) {
                throw new \E404Exeption('Такой новости не найдено!');
            }
            else {
                $view = new \View();
                $view->news = $news;
                $view->display($this->act, NewsModel::$sqlTable);
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

        $news = NewsModel::GetOneArticleByColumn($_GET['nameOfColumn'], $_GET['text']);
        if (false == $news) {
            throw new \E404Exeption('Совпадений не найдено!');
        }
        else {
            $view = new \View();
            $view->news = $news;
            #var_dump($news); die;
            $view->display($this->act, NewsModel::$sqlTable);
        }
    }

}


