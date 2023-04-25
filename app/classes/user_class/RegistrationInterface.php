<?php

namespace Classes\UserClass;

interface RegistrationInterface{
    
    public function getUsername();
    public function getEmail();
    public function setPassword($password);
    public function getPassword();
    public function setSalt($salt);
    public function getSalt();
    public function register($username, $email, $password, $salt, callable $function);
    public function checkPassword($password, $passwordConfirm);
    public function hashPassword($password, $salt = null);
}