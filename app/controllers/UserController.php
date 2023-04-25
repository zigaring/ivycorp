<?php

use Models\UserModel;
use PaymentClass\Cash;
use PaymentClass\Visa;
use Database\Connection;
use PaymentClass\Paypal;
use Classes\UserClass\User;
use Classes\UserClass\Worker;
use Classes\InputClass\Registration;

require('../../vendor/autoload.php');
include('../classes/user_class/RegistrationInterface.php');
require('../classes/user_class/User.php');
require('../classes/user_class/Worker.php');
require('../../app/classes/input_class/Registration.php');
require('../classes/payment_class/PaymentTypeInterface.php');
require('../classes/payment_class/Cash.php');
require('../classes/payment_class/Visa.php');
require('../classes/payment_class/Paypal.php');


    $pdo = new Connection;

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        

        if(isset($_POST['register'])){

            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $passwordConfirm = $_POST['passwordConfirm'];

            switch($_POST['paymentType']){
                case 'Cash':
                    $paymentType = new Cash;
                break;
                case 'Visa':
                    $paymentType = new Visa;
                break;
                case 'Paypal':
                    $paymentType = new Paypal;
                break;
            }
            switch($_POST['registerHiddenInput']){
                case 'User':
                    $user = new User($username, $email, $paymentType);
                break;
                case 'Worker':
                    $user = new Worker($username, $email, $paymentType);
                break;
            }

            $registration = new Registration($pdo);
            $registration->validateUser($user, $password, $passwordConfirm);

            header("Location: http://localhost:8888/public/view/show.php");
        }
        
    }
    elseif(isset($_GET['users'])){

             $users = [];
             $usersModel = new UserModel($pdo);
             $users = $usersModel->getUsers();

             include('../../public/view/show.php');
        }
    elseif(isset($_GET['create_user'])){
            
        include('../../public/view/create_user.php');
       }

    elseif(isset($_GET['create_worker'])){
            
        include('../../public/view/create_worker.php');
   } 
    