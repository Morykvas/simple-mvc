<?php 
// ini_set('display_errors', 1);
// error_reporting(E_ALL);

use Database\Database;

class ModelRegistration  {
    private $database; 

    public function __construct() {
        $this->database = new Database();
    }

    public function processFormData($firstName, $lastName, $email, $pass) {
        $this->database->setDataRegistration($firstName, $lastName, $email, $pass);
    } 

    public function counteEmail($email) {
        return  $this->database->scheckEmail($email);
    }

}