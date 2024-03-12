<?php
namespace requestDb\Authorization;

use requestDb\Database\Database;

class AuthorizationDb 
{
   private  $database;
   private  $pdo; 

    public function __construct()
    {
        $this->database = new Database();
        $this->pdo      = $this->database->getPDO();
    }

    public function authorizationUser($email, $pass) {
    
        try {
        
            $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = ? AND pass = ? ");
            $stmt->execute([$email, $pass]);
            $row = $stmt->fetch(\PDO::FETCH_ASSOC);
           
        } catch (\PDOException $e) {
            echo 'Проблеми з авторизацією, запит не вдалий' . $e->getMessage();
        }
         
        return $row;

    }

}