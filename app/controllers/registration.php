<?php

class Registration extends Controller {

    private $model;
    private $session;


    public function __construct()
    {
        $this->model = $this->model('ModelRegistration');
        $this->session = new ModelSession();
    }

    public function index() { 
        http_response_code(404);
        $this->view('404', ['message' => 'Такої сторінки не існує', 'title' => '404 Not Found']);
    }

    public function page() {
        $this->view('authent/registration', []);
    }

    public function processForm() {

        $firstName = $_POST['firstName'];
        $lastName  = $_POST['lastName'];
        $email     = $_POST['email'];
        $pass      = $_POST['pass'];
       
        switch($_SERVER['REQUEST_METHOD'] == 'POST') {
            case empty($firstName) || empty($lastName) || empty($email) || empty($pass) :
                    $message = $this->session->setErrorMessage('Потрібно заповнити всі поля!');
                    $this->view('authent/registration', [ 'session' => $message ]);
                    break;  
            case $this->model->counteEmail($email) > 0:
                    $message = $this->session->setErrorMessage('Такий емейл вже зареєстрований! будь ласка йдіть нахуй!');
                    $this->view('authent/registration', ['session' =>  $message ]);
                    break;
            default: 
            $this->model->processFormData($firstName, $lastName, $email, $pass);
            $message = $this->session->setSuccessMessage('Ви звреєструвались успішно!');
            $this->view('authent/registration', ['session' => $message]);
        } 
    }
}