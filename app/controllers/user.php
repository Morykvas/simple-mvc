<?php 

class User extends Controller {

    private $model; 
    private $session;
    private $setUrl;


    public function __construct() 
    {
        $this->model = $this->model('ModelEditData');
        $this->setUrl = $this->model('ModelUpdateUrl');
        $this->session = new ModelSession();
    }
    
    public function page() {
        $this->view('user/userPage', []);
    }
    
    public function editForm() {
        
        $firstName = isset($_POST['firstName']) ? $_POST['firstName'] : null;
        $lastName  = isset($_POST['lastName'])  ? $_POST['lastName'] : null;
        $email     = isset($_POST['email'])     ? $_POST['email'] : null;
        $pass      = isset($_POST['pass'])      ? $_POST['pass'] : null;
        $id        = isset($_POST['user_id'])   ? $_POST['user_id'] : null;

        switch($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($id) ) {
            case empty($firstName ) && empty($lastName) && empty($email) && empty($pass) :
                $message = $this->session->setErrorMessage('Bи не змогли редагувати дані свого акаунту, вам потрібно внести хоча б одну зміну для редагування');
                $this->view('user/userPage', ['session' => $message]);
                break;
            default : 
            $this->model->updateDataUser($firstName, $lastName, $email, $pass, $id);
            $message = $this->session->setSuccessMessage('Вам вдалось редагувати особисті дані');
            $this->view('user/userPage', ['session' => $message]);
        }
    }

    public function Exit() {
       $this->session->endSession();
       $this->setUrl->setUrl('');
    }
}