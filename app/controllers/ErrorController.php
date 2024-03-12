<?php

namespace controllers\ErrorController;
use Controller;
use ModelUpdateUrl;

class ErrorController  extends Controller{
     public function notFound() {
        http_response_code(404);
        $this->view('404', ['message' => 'Такої сторінки не існує', 'title' => '404 Not Found']);
    }  
}
