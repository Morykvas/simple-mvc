<?php 

use Database\Database;

class ModelEditData 
{
    private $database;

    public function __construct()
    {
        $this->database = new Database;
    }
    public function updateDataUser( $firstName, $lastName, $email, $pass, $id ) {
        return $this->database->userEditData($firstName, $lastName, $email, $pass, $id);
    }
}