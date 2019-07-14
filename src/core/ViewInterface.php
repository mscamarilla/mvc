<?php

namespace Core;

interface ViewInterface
{
    public function setViewName($view_name);
    public function render($data = null);
}