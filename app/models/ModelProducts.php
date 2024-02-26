<?php 


use Database\Database;

class ModelProducts 
{
    private $database;

    public function __construct()
    {
        $this->database = new Database();
    }

    public function allProducts() 
    {
        $request = $this->database->products(); 
        return $request;
    }

    public function getProductById($productId) 
    {
        $product = $this->database->productId($productId);
        return $product;
    }
}
