<?php

namespace Classes\UserClass;

//include('RegistrationInterface.php');

use PaymentClass\PaymentTypeInterface;

Class Worker implements RegistrationInterface{
    
    private $username;
    private $email;
    private $hashedPassword;
    private $salt;
    private $paymentType;

    public function __construct($username, $email, PaymentTypeInterface $paymentType)
    {
        $this->username = $username;
        $this->email = $email;
        $this->paymentType = $paymentType;
        $this->paymentType->payment();
    }

    public function getUsername(){
        return $this->username;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setPassword($hashedPassword){
        $this->hashedPassword = $hashedPassword;
    }

    public function setSalt($salt){
        $this->salt = $salt;
    }

    public function getPassword(){
        return $this->hashedPassword;
    }

    public function getSalt(){
        return $this->salt;
    }

    public function checkPassword($password, $passwordConfirm){
        
        if($password === $passwordConfirm){
            return true;
        }else{
            return false;
        }
    }

    public function hashPassword($password, $salt = null){
        
        $salt = bin2hex(random_bytes(12));
        $saltedPassword = $password . $salt;
        $hashedPassword = password_hash($saltedPassword, PASSWORD_DEFAULT, ['salt' => $salt]);
        
        $this->setPassword($hashedPassword);
        $this->setSalt($salt);
    }

    public function register($username, $email, $password, $salt, callable $function){

    }
}