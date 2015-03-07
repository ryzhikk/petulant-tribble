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
        $news = News::GetAllArticle();
        if (false != $news)
        {
            $view = new View();
            $view->news = $news;
            $view->display($this->act, News::$sqlTable);
        }
        else
        {
            throw new E404Exeption;
        }
    }

    public function actionOne()
    {
        if (!empty ($_GET['id']))
        {
            $objNews  = new News();
            $objNews->id = $_GET['id'];
            $news = $objNews->GetOneArticleByPk();

            #var_dump($news); die;

            if (false != $news)
            {
                $view = new View();
                $view->news = $news;
                $view->display($this->act, News::$sqlTable);
            }
            else
            {
                throw new E404Exeption('Такой новости не найдено!');
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

        $news = News::GetOneArticleByColumn($_GET['nameOfColumn'], $_GET['text']);
        if (false != $news)
        {
            $view = new View();
            $view->news = $news;
            #var_dump($news); die;
            $view->display($this->act, News::$sqlTable);
        }
        else
        {
            throw new E404Exeption('Совпадений не найдено!');
        }
    }

}


