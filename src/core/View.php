<?php

namespace Core;

class View implements ViewInterface
{

    protected $view_name;

    public function setViewName($view_name)
    {
        $this->view_name = $view_name;

    }

    public function render($data = null)
    {
        if(is_file('src/view/' . $this->view_name)) {
            include 'src/view/' . $this->view_name;
        } else{
            header(sprintf("Location: %s", 'index.php?route=error/view_error'));
        }
    }
}