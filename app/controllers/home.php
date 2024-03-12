<?php 
require_once 'ErrorController.php';

class Home extends Controller 
{
    public function index() 
    {
        $this->view('index', ['title' => 'Головна сторінка']);
    } 
}

