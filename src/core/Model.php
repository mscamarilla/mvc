<?php

namespace Core;

abstract class Model
{
    protected $db;

    public function __construct()
    {
        $this->db = new DatabaseExecution();

    }

}
