<?php

use requestDb\ProductCategory\ProductsCategory;

class ModelCategory 
{
    private $databace;
    
    public function __construct()
    {
        $this->databace = new ProductsCategory();
    }
    public function productCategory($category) {
       $row = $this->databace->selectProdCategory($category);   
       return $row;
    }
}