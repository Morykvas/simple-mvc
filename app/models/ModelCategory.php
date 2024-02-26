<?php

use Database\Database;
use LDAP\Result;

class ModelCategory 
{
    private $databace;
    public function __construct()
    {
        $this->databace = new Database();
    }
    public function productCategory($category) {
       $row = $this->databace->selectProdCategory($category);   
       return $row;
    }
}