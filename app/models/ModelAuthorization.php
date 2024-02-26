<?php 

use Database\Database;

class ModelAuthorization  {
    private $database; 

    public function __construct() {
        $this->database = new Database();
    }

    public function dataAuthorization($email, $pass) {
        return  $this->database->authorizationUser($email, $pass);
    }
}