<?php 
require_once 'ErrorController.php';

class Home extends Controller 
{
    public function index() 
    {
        $this->view('home/index', ['title' => 'Головна сторінка']);
    } 
}

