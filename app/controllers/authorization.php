<?php

class Authorization extends Controller {

    private $model;
    private $controller;
    private $user;
    private $session;
    private $setUrl;
    
    public function  __construct() {
        $this->model = $this->model('ModelAuthorization'); 
        $this->user = new User();  
        $this->session = new ModelSession();
        $this->controller = new Controller();  
        $this->setUrl =  $this->model('ModelUpdateUrl');     
    }

    public function index() { 
        http_response_code(404);
        $this->view('404', ['message' => 'Такої сторінки не існує', 'title' => '404 Not Found']);
    }
 
    public function page() {
        $this->view('authent/authorization', []);
    }

    public function processForm() {

    $email    = $_POST['email'];
    $password = $_POST['password'];
    
    $userRow  = $this->model->dataAuthorization($email, $password);
    
        switch($_SERVER['REQUEST_METHOD'] == 'POST' ) {
            case empty($email) || empty($password) : 
                $message = $this->session->setErrorMessage('Для авторизації введіть всі днаі!');
                $this->view('authent/authorization', ['session' => $message]);
                    break;
            case isset($email) !== isset($userRow['email'] ) || isset($password) !== isset(  $userRow['pass']) :
                $message = $this->session->setErrorMessage('Пароль або емейл не вірний, спробуйте ще раз!');
                $this->view('authent/authorization', ['session' => $message]);
                    break;
            default : 
            $this->view('user/userPage', ['data' => $this->session->setUserData($userRow)]); 
            $this->setUrl->setUrl('user/page');
        }
    }
}
