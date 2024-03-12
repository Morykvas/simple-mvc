<?php 

// namespace Database;

namespace requestDb\Database;

use Exception;
use PDOException;

class Database 
{
    private $pdo; 

    public function __construct() 
    {
        $dbHost = 'localhost';
        $dbName = 'project';
        $dbUser = 'root';
        $dbPass = 'root';

        try {
            $this->pdo = new \PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            echo "Помилка з'єднання з базою даних: " . $e->getMessage() . $e->getLine(). ' залупа';
            die();
        }
    }
    public function getPDO() 
    {
       return $this->pdo;
    }

    // public function products() 
    // {
    //     try {
    //         $query = $this->getPDO()->prepare("SELECT product_name, product_description FROM products");

    //         // $query = $this->pdo->prepare("SELECT product_name, product_description FROM products");
    //         $query->execute();
    //         $result = $query->fetchAll(\PDO::FETCH_ASSOC);

    //         $products = array(); 
    //         foreach ($result as $row) {
    //          $products[] = $row;
    //         }
            
    //         return $products;
    //     } catch (\PDOException $e) {
    //         die("Помилка виконання запиту: " . $e->getMessage() .'<br>' . $e->getLine());
    //     }
    // }

    // public function productId($productId) 
    // {
    //     try {
    //         $statement = $this->pdo->prepare("SELECT product_id, product_name, product_description FROM products WHERE product_id = :product_id");
    //         $statement->bindParam(':product_id', $productId, \PDO::PARAM_INT);
    //         $statement->execute();
        
    //         $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
          
    //         return $result;
    //     } catch (\PDOException $e) {
    //         die("Помилка виконання запиту: " . $e->getMessage());
    //     }
    // }

    // public function checkUrl() {
     
    //     try {
    //         $query = $this->pdo->prepare('SELECT url FROM urls');
    //         $query->execute();
    //         $result = $query->fetchAll(\PDO::FETCH_ASSOC);
           
    //         $resultUrl = [];
         
    //         foreach ($result as $value) {
    //             $resultUrl[] = $value['url'];  
                
    //         }
    //         return $resultUrl;

    //     } catch(\PDOException $e) { 
    //         echo "Помилка запиту: " . $e->getMessage();
    //     }
    // }

    // public function setDataRegistration($firstName, $lastName, $email, $pass) {

    //     try {
    //         $stmt = $this->pdo->prepare("INSERT INTO users (firstname, lastname, email, pass) VALUES (:firstName, :lastName, :email, :pass)");
    //         $stmt->bindValue(':firstName', $firstName, \PDO::PARAM_STR);
    //         $stmt->bindValue(':lastName' , $lastName , \PDO::PARAM_STR);
    //         $stmt->bindValue(':email'    , $email    , \PDO::PARAM_STR);
    //         $stmt->bindValue(':pass'     , $pass     , \PDO::PARAM_STR);
    //         $result =  $stmt->execute();

    //     } catch (PDOException $e) {
    //         echo 'Помилка відправлення даних користувача, для Реєстрації!' . $e->getMessage();
    //     }  
    //     return $result;
    // }

    // public function scheckEmail($email) {
       
    //     try {

    //         $stmt = $this->pdo->prepare("SELECT COUNT(*) as count FROM users WHERE email = :email");
    //         $stmt->bindParam(':email', $email, \PDO::PARAM_STR);
    //         $stmt->execute();
    //         $countEmail = $stmt->fetch(\PDO::FETCH_ASSOC);
            
    //         $count = $countEmail['count'];
          
    //     } catch(PDOException $e) {
    //         echo 'не вдалось перебрати емейл для визначення повторного  ' . $e->getMessage(); 
    //     }
    //     return $count;
    
    // }  

    // public function authorizationUser($email, $pass) {
    
    //     try {
        
    //         $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = ? AND pass = ? ");
    //         $stmt->execute([$email, $pass]);
    //         $row = $stmt->fetch(\PDO::FETCH_ASSOC);
           
    //     } catch ( PDOException $e) {
    //         echo 'Проблеми з авторизацією, запит не вдалий' . $e->getMessage();
    //     }
         
    //     return $row;

    // }
    
    // public function userEditData($firstName, $lastName, $email, $pass, $id) 
    // {

    //     $updateFields = [];

    //     if(!empty($firstName)) {
    //       $updateFields[] = "firstname = :firstName";
    //     }
    //     if(!empty($lastName)) {
    //       $updateFields[] = "lastname = :lastName";
    //     }
    //     if(!empty($email)) {
    //      $updateFields[]  = "email = :email";
    //     }
    //     if(!empty($pass)) {
    //      $updateFields[] = "pass = :pass";
    //     }

    //     $updateFieldsString = implode(', ', $updateFields) ;
       

    //     try {

    //         $userId = $id;
    //         if(!empty($updateFieldsString)) {
    //             $stmt = $this->pdo->prepare("UPDATE users SET $updateFieldsString WHERE user_id = :userId");
            
    //             $stmt->bindParam(':userId', $userId, \PDO::PARAM_INT);

    //             if(!empty($firstName)) {
    //                 $stmt->bindParam(':firstName', $firstName);
    //             }
    //             if(!empty($lastName)) {
    //                 $stmt->bindParam(':lastName', $lastName);
    //             }
    //             if(!empty($email)) {
    //                 $stmt->bindParam(':email', $email);
    //             }
    //             if(!empty($pass)) {
    //                 $stmt->bindParam(':pass', $pass);
    //             }
    //             $stmt->execute();
        
    //         }
    //     } catch(PDOException $e) {
    //         echo 'Не вдалось редагувати персональні дані користувача з ID:'.$userId . '  Повідомлення ' . $e->getMessage();
    //     }
    // }
    
    // public function selectProdCategory($category)  
    // {

    //     try {
    //         // $stmt = $this->pdo->prepare("SELECT products.product_name, products.product_description, products.product_price, categories.category_translation FROM products JOIN categories ON products.category_id = categories.category_id WHERE categories.category_translation = :category_translation");
    //         $stmt = $this->pdo->prepare("SELECT products.product_name, products.product_description, products.product_price, categories.category_translation, categories.category_name FROM products JOIN categories ON products.category_id = categories.category_id WHERE categories.category_translation = :category_translation");

    //         $stmt->bindParam(':category_translation', $category, \PDO::PARAM_STR); 
    //         $stmt->execute(); 
    //         $rows = [];
        
    //         while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
    //             $rows[] = $row;
    //         }
          
    //         return $rows;
        
    //     } catch (PDOException $e) {
    //         echo 'Помилка НЕ вдалось отримати категорію продукту' . $e->getMessage() . '  ' . $e->getLine();
    //     }
    // }
}

