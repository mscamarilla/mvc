<?php


namespace Controller;
use Core\Controller;


class ControllerArticle extends Controller
{



    public function actionIndex()
    {
        //if ($this->auth()){

            $this->loadModel('model_article');

            $data = $this->model_article->getArticles();
            $this->view->render(json_encode($data));
        /*} else {
            header(sprintf("Location: %s", 'index.php?route=error/forbidden'));
        }*/

    }

    public function actionCreate()
    {
        print_r('create from Article');
    }

    public function actionDelete()
    {
        print_r('delete from Article');
    }

}