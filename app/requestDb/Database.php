<?php 

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
}

