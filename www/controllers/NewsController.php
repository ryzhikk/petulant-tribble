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
        $add = $_COOKIE['add'];
        setcookie('add', '', time()-3600);

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

        $get_new = new News();
        $get_new->id = $_GET['id'];
        $news = $get_new->GetOneArticle();


        $view = new View();
        $view->assign('news', $news);
        $view->display(News::$sql_table, $this->act);
        }

        else
        {
            return 'Error!';
        }
    }

}