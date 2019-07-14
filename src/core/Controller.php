<?php


namespace Core;


use Controller\ControllerUser;

class Controller
{
    protected $view;
    private $id;

    function __construct($view)
    {
        $view_name = str_replace('Controller', 'View', implode('', array_slice(explode('\\', get_class($this)), -1)));

        $this->view = $view;
        $this->view->setViewName($view_name . '.php');


    }

    protected function loadModel($model_alias)
    {
        $model_name = $this->renameModel($model_alias);

        $this->$model_alias = new $model_name;

    }

    protected function renameModel($model_alias)
    {
        $model_name_parts = explode('_', $model_alias);

        foreach ($model_name_parts as $value) {
            $model_name_array[] = ucfirst($value);
        }

        $model_name = '\Model\\' . implode('', $model_name_array);

        return $model_name;

    }

    protected function auth($token)
    {
        if ($this->isTokenValid($token)) {

            $user = $this->model->getUserByToken($token);
            $this->id = $user['id'];

            return true;
        } else {
            //return false;
            return true;
        }

    }

    private function isTokenValid(string $token): bool
    {
        if ($this->model->findUserByToken($token)) {
            return true;
        } else {
            return false;
        }
    }

}