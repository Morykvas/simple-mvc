<?php 

use requestDb\EditDataUser\UserEditData;

class ModelEditData 
{
    private $database;

    public function __construct()
    {
        $this->database = new  UserEditData();
    }
    public function updateDataUser( $firstName, $lastName, $email, $pass, $id ) {
        return $this->database->userEditData($firstName, $lastName, $email, $pass, $id);
    }
}