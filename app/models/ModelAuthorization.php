<?php 

use requestDb\Authorization\AuthorizationDb;

class ModelAuthorization  {
    private $database; 

    public function __construct() {
        $this->database = new AuthorizationDb();
    }

    public function dataAuthorization($email, $pass) {
        return  $this->database->authorizationUser($email, $pass);
    }
}