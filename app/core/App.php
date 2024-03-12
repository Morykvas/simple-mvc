<?php 

use requestDb\CheckUrl\CheckUrl;
use controllers\ErrorController\ErrorController;

class App {
    
    protected $controller = 'home';
    protected $method = 'index'; 
    protected $params = [];
    protected $errorController; 
    protected $checkUrl;  
    protected $productId;
  

    public function __construct() 
    {
        $url = $this->parseUrl();
        
        if(file_exists('../app/controllers/' . $url[0] . '.php' )) {
            $this->controller = $url[0];
            unset($url[0]);
        }  
       
        require_once '../app/controllers/' . $this->controller . '.php';
 
        $this->controller = new $this->controller;  
        
        if(isset($url[1])) {
            if(method_exists($this->controller, $url[1])) {
                $this->method = $url[1]; 
                unset($url[1]);
            } 
        } 
        
        $this->params = $url ? array_values($url) : [];
        call_user_func_array([$this->controller, $this->method], $this->params);
        
    }
    
    public function checkUrl() 
    {
        $this->checkUrl = new CheckUrl();
        $urls = $this->checkUrl->checkUrl();
        return  $urls;
    }
    
    public function parseUrl()
    {
        $urls = $this->checkUrl();

        if(isset($_GET['url'])) {
            $url = explode('/', filter_var(trim($_GET['url'], '/')), FILTER_SANITIZE_URL);
       
            $numId = '';
            foreach ($url as $value) {
                if (is_numeric($value)) {
                    $numId = $value;
                    array_push($url, $value);
                }
            }

            array_push($urls, $numId);
            foreach ($url as $value) {
                if (!in_array($value, $urls)) {
                    $this->errorController = new ErrorController;
                    $this->errorController->notFound();
                    exit;
                } 
            }
            return $url;
        }
    }
}
