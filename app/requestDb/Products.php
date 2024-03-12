<?php 
namespace requestDb\Products;
use Exception;
use PDOException;
use requestDb\Database\Database;

class Products 
{
    private $database;
    private $pdo;
    public function __construct() 
    {
        $this->database = new Database();
        $this->pdo = $this->database->getPDO();
    }
    
    public function products() 
    {
        try {
           
            $query = $this->pdo->prepare("SELECT product_name, product_description FROM products");
            // $query = $this->pdo->prepare("SELECT product_name, product_description FROM products");
            $query->execute();
            $result = $query->fetchAll(\PDO::FETCH_ASSOC);

            $products = array(); 
            foreach ($result as $row) {
             $products[] = $row;
            }
            
            return $products;
        } catch (\PDOException $e) {
            die("Помилка виконання запиту: " . $e->getMessage() .'<br>' . $e->getLine());
        }
    }    
}