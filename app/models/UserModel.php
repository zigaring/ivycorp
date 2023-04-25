<?php

namespace Models;

require('../../database/Connection.php');
require('../../vendor/autoload.php');

use Database\Connection;
use Classes\UserClass\User;


    Class UserModel {

    protected $pdo;

    public function __construct(Connection $pdo){
        $this->pdo = $pdo->getPdo();
    }


    public function getUsers(){
        $stmt = $this->pdo->query("SELECT * FROM users ORDER BY created_at DESC");
        $users = $stmt->fetchAll();
        return $users;
    }

    public function registerUser($username, $email, $password, $salt){
        
        $stmt = $this->pdo->prepare("INSERT INTO users (username, email, password, salt) VALUES (?, ?, ?, ?)");
        $stmt->execute([$username, $email, $password, $salt]);
    }

    public function registerWorker($username, $email, $password, $salt){
        $stmt = $this->pdo->prepare("INSERT INTO workers (username, email, password, salt) VALUES (?, ?, ?, ?)");
        $stmt->execute([$username, $email, $password, $salt]);
    }

}