<?php 

use requestDb\Products\Products;

class ModelProducts
{
    private $database;

    public function __construct() {
        $this->database   = new Products();
    }

    public function allProducts() 
    {
       $request = $this->database->products();        
       return $request;
    }
}



