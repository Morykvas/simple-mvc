<?php 

namespace requestDb\ProductCategory;

use requestDb\Database\Database;

class ProductsCategory 
{
    private $database;
    private $pdo;
    

    public function __construct()
    {
        $this->database = new Database();
        $this->pdo      = $this->database->getPDO();
    }
    public function selectProdCategory($category)  
    {

        try {
            // $stmt = $this->pdo->prepare("SELECT products.product_name, products.product_description, products.product_price, categories.category_translation FROM products JOIN categories ON products.category_id = categories.category_id WHERE categories.category_translation = :category_translation");
            $stmt = $this->pdo->prepare("SELECT products.product_name, products.product_description, products.product_price, categories.category_translation, categories.category_name FROM products JOIN categories ON products.category_id = categories.category_id WHERE categories.category_translation = :category_translation");

            $stmt->bindParam(':category_translation', $category, \PDO::PARAM_STR); 
            $stmt->execute(); 
            $rows = [];
        
            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                $rows[] = $row;
            }
          
            return $rows;
        
        } catch (\PDOException $e) {
            echo 'Помилка НЕ вдалось отримати категорію продукту' . $e->getMessage() . '  ' . $e->getLine();
        }
    }
    
}