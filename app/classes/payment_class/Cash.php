<?php

namespace PaymentClass;

ini_set('display_errors', 1);
error_reporting(E_ALL);


use PaymentClass\PaymentTypeInterface;;

Class Cash implements PaymentTypeInterface{

    protected $paymentType = 'Cash';
    public function payment(){
        
        
    }
}