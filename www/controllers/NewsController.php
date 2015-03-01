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
        $view->assign('news', $news);
        $view->items = $news;
        $view->display(News::$sql_table, $this->act);
    }

    public function actionOne()
    {
        if (!empty ($_GET['id']))
        {

        $getOne = new News();
        $getOne->id = $_GET['id'];
        $news = $getOne->GetOneArticle();
        #var_dump($news); die;


        $view = new View();
        $view->assign('news', $news);
        $view->items = $news;
        $view->display(News::$sql_table, $this->act);
        }

        else
        {
            return 'Error!';
        }
    }

}