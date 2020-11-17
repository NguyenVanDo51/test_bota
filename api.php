<?php

require_once('class/RestfulApi.php');

class api extends RestfulApi
{
    public function __construct()
    {
        parent::__construct();
    }

    function user()
    {
        if ($this->method == "GET") {
            $this->response(200, ['message' => 'hihi']);
        }
    }
}

$api = new api();
