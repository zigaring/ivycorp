<?php

namespace Database;

use PDO;
use PDOException;

Class Connection{

    private $user = 'root';
    private $password = '';
    private $host = 'localhost';
    private $database = 'ivy_corp';
    private $pdo;

    public function __construct(){

        try{
            $this->pdo = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->database, $this->user, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            echo 'Connection failed: ' . $e->getMessage();
        }
        
    }

    public function getPdo(){
        return $this->pdo;
    }
}