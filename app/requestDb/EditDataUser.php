<?php 

namespace requestDb\EditDataUser;
use requestDb\Database\Database;

class UserEditData 

{
   private $database;
   private $pdo; 

   public function __construct()
   {
        $this->database = new Database();
        $this->pdo      = $this->database->getPDO();
   }

   public function userEditData($firstName, $lastName, $email, $pass, $id) 
   {

       $updateFields = [];

       if(!empty($firstName)) {
         $updateFields[] = "firstname = :firstName";
       }
       if(!empty($lastName)) {
         $updateFields[] = "lastname = :lastName";
       }
       if(!empty($email)) {
        $updateFields[]  = "email = :email";
       }
       if(!empty($pass)) {
        $updateFields[] = "pass = :pass";
       }

       $updateFieldsString = implode(', ', $updateFields) ;
      

       try {

           $userId = $id;
           if(!empty($updateFieldsString)) {
               $stmt = $this->pdo->prepare("UPDATE users SET $updateFieldsString WHERE user_id = :userId");
           
               $stmt->bindParam(':userId', $userId, \PDO::PARAM_INT);

               if(!empty($firstName)) {
                   $stmt->bindParam(':firstName', $firstName);
               }
               if(!empty($lastName)) {
                   $stmt->bindParam(':lastName', $lastName);
               }
               if(!empty($email)) {
                   $stmt->bindParam(':email', $email);
               }
               if(!empty($pass)) {
                   $stmt->bindParam(':pass', $pass);
               }
               $stmt->execute();
       
           }
       } catch(\PDOException $e) {
           echo 'Не вдалось редагувати персональні дані користувача з ID:'.$userId . '  Повідомлення ' . $e->getMessage();
       }
   }
}