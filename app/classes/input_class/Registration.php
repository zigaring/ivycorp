<?php

namespace Classes\InputClass;

use Exception;
use Models\UserModel;
use Database\Connection;
use Classes\UserClass\User;
use Classes\UserClass\Worker;
use Classes\UserClass\RegistrationInterface;

    require('../../vendor/autoload.php');
    require('../models/UserModel.php');


Class Registration extends UserModel {

    protected $username;
    protected $email;
    protected $password;
    protected $salt;

    public function validateUser(RegistrationInterface $user, $password, $passwordConfirm){

        if(empty($user->getUsername() || empty($user->getEmail() || empty($password) || empty($passwordConfirm)))){
            throw new Exception('All fields are required!');
        }

        if(!filter_var($user->getEmail(), FILTER_VALIDATE_EMAIL)){
            throw new Exception('invalid Email format!');
        }

        if($user->checkPassword($password, $passwordConfirm)){
            $user->hashPassword($password);    
       }else{
            throw new Exception('Passwords dont match!');
       }


       $this->username = $user->getUsername();
       $this->email = $user->getEmail();
       $this->password = $user->getPassword();
       $this->salt = $user->getSalt();
       
       try{
            if($user instanceof User){

                $user->register($this->username, $this->email, $this->password, $this->salt, 
                function($username, $email, $password, $salt){$this->registerUser($username, $email, $password, $salt);});

            }elseif($user instanceof Worker){
                $user->register($this->username, $this->email, $this->password, $this->salt, 
                function($username, $email, $password, $salt){$this->registerWorker($username, $email, $password, $salt);});
            }
       }catch(Exception $e){
            echo 'Error, something went wrong: ' . $e;
       }
       return $user;
       
     }
}