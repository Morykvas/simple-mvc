<?php

namespace requestDb\ProductsById;

use requestDb\Database\Database;

class ProductsId 
{ 
    private $database;
    private $pdo;

    public function __construct() 
    {
        $this->database = new Database();
        $this->pdo      = $this->database->getPDO();
    }

    public function productId($productId) 
    {
        try {
            $statement = $this->pdo->prepare("SELECT product_id, product_name, product_description FROM products WHERE product_id = :product_id");
            $statement->bindParam(':product_id', $productId, \PDO::PARAM_INT);
            $statement->execute();
        
            $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
          
            return $result;
        } catch (\PDOException $e) {
            die("Помилка виконання запиту: " . $e->getMessage());
        }
    }

}