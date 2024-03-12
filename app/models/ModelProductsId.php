<?php 

use requestDb\ProductsById\ProductsId;

class ModelProductsId 
{
    private  $database;

    public function __construct() 
    {
        $this->database = new ProductsId();
    }

    public function getProductById($productId) 
    {
        $product = $this->database->productId($productId);
        return $product;
    }
}