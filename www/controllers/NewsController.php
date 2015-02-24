<?php

class NewsController
{
    public function actionAll()
    {
        $add = $_COOKIE['add'];
        setcookie('add', '', time()-3600);

        $news = News::GetAllArticle();
        require __DIR__ . '/../views/news/index.php';

    }

    public function actionOne()
    {
        if (!empty ($_GET['id'])) {

        $get_new = new News();
        $get_new->id = $_GET['id'];
        $new = $get_new->GetOneArticle();
        require __DIR__ . '/../views/news/new.php';
        }
    }

    public function actionNew()
    {
        require __DIR__ . '/../functions/session.php';

        if (!empty ($_POST['send_new'])) {

            $upload_news = new News();

            if (News::AddNewArticle()) {
                setcookie('add', 'new', time()+3600);
                header ('Location: /index.php');
            }

            else {
                echo 'Ошибка!';
            }
        }
        require __DIR__ . '/../views/news/add_new.php';
        var_dump($_SESSION);

    }

    public function actionEdit()
    {
        require __DIR__ . '/../views/news/edit_new.php';

    }
}