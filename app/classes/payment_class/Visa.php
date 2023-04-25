<?php

namespace PaymentClass;

use PaymentClass\PaymentTypeInterface;;

Class Visa implements PaymentTypeInterface{

    protected $paymentType = 'Visa';
    public function payment(){
        return $this->paymentType;
    }
}