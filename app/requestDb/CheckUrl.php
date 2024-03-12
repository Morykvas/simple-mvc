<?php

namespace requestDb\checkUrl;
use requestDb\Database\Database;

class CheckUrl 
{

    private $database;
    private $pdo; 

    public function __construct()
    {
        $this->database = new Database();
        $this->pdo      = $this->database->getPDO();
    } 
    public function checkUrl() {
     
        try {
            $query = $this->pdo->prepare('SELECT url FROM urls');
            $query->execute();
            $result = $query->fetchAll(\PDO::FETCH_ASSOC);
           
            $resultUrl = [];
         
            foreach ($result as $value) {
                $resultUrl[] = $value['url'];  
                
            }
            return $resultUrl;

        } catch(\PDOException $e) { 
            echo "Помилка запиту: " . $e->getMessage();
        }
    }
}