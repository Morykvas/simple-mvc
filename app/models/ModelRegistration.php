<?php 

use requestDb\Registration\RegistrationDb;

class ModelRegistration  {
    private $database; 

    public function __construct() {
        $this->database = new RegistrationDb();
    }

    public function processFormData($firstName, $lastName, $email, $pass) {
        $this->database->setDataRegistration($firstName, $lastName, $email, $pass);
    } 

    public function counteEmail($email) {
        return  $this->database->scheckEmail($email);
    }
}