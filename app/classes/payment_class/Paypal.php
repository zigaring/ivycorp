<?php

namespace PaymentClass;


use PaymentClass\PaymentTypeInterface;;

Class Paypal implements PaymentTypeInterface{

    protected $paymentType = 'Paypal';
    public function payment(){
        return $this->paymentType;
    }
}