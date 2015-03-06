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
        $news = News::GetAllArticle();

        $view = new View();
        $view->news = $news;
        $view->display(News::$sqlTable, $this->act);
    }

    public function actionOne()
    {
        if (!empty ($_GET['id']))
        {
            $objNews  = new News();
            $objNews->id = $_GET['id'];
            $news = $objNews->GetOneArticleByPk();

            #var_dump($news); die;

            $view = new View();
            $view->news = $news;
            $view->display(News::$sqlTable, $this->act);
        }

        else
        {
            return 'Error!';
        }
    }

    public function actionSearch ()
    {
        #var_dump($_GET);

        $news = News::GetOneArticleByColumn($_GET['nameOfColumn'], $_GET['text']);

        $view = new View();
        $view->news = $news;
        #var_dump($news); die;
        $view->display(News::$sqlTable, $this->act);
    }

}


