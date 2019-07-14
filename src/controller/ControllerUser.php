<?php


namespace Controller;
use Core\Controller;


class ControllerUser extends Controller
{
    private $token;

    public function actionIndex()
    {
        if(!empty($_SERVER['HTTP_AUTH_TOKEN'])){
            $this->token = $_SERVER['HTTP_AUTH_TOKEN'];
            $this->auth($this->token);
        }

        print_r($this);


    }
}