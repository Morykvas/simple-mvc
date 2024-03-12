<?php 

namespace requestDb\Registration;

use requestDb\Database\Database;


class RegistrationDb

{
    private $database;
    private $pdo;

    public function __construct()
    {
        $this->database = new Database;
        $this->pdo      = $this->database->getPDO();
    }

    public function setDataRegistration($firstName, $lastName, $email, $pass) {

        try {
            $stmt = $this->pdo->prepare("INSERT INTO users (firstname, lastname, email, pass) VALUES (:firstName, :lastName, :email, :pass)");
            $stmt->bindValue(':firstName', $firstName, \PDO::PARAM_STR);
            $stmt->bindValue(':lastName' , $lastName , \PDO::PARAM_STR);
            $stmt->bindValue(':email'    , $email    , \PDO::PARAM_STR);
            $stmt->bindValue(':pass'     , $pass     , \PDO::PARAM_STR);
            $result =  $stmt->execute();

        } catch (\PDOException $e) {
            echo 'Помилка відправлення даних користувача, для Реєстрації!' . $e->getMessage();
        }  
        return $result;
    }
    
    public function scheckEmail($email) {
       
        try {

            $stmt = $this->pdo->prepare("SELECT COUNT(*) as count FROM users WHERE email = :email");
            $stmt->bindParam(':email', $email, \PDO::PARAM_STR);
            $stmt->execute();
            $countEmail = $stmt->fetch(\PDO::FETCH_ASSOC);
            
            $count = $countEmail['count'];
          
        } catch(\PDOException $e) {
            echo 'не вдалось перебрати емейл для визначення повторного  ' . $e->getMessage(); 
        }
        return $count;
    
    }  

    
}