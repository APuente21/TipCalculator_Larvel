<?php

require("Bill.php");
require("Form.php");

use Restaurant\Bill;
use DWA\Form;

$form = new Form($_GET);


class Foo
{
    private $a;

    public function __construct(){
        $a=10;
    }
    public function getA() {
        print($a); // prints '20'
    }
}


if($form->isSubmitted()) {
    # Validate
    $errors = $form->validate([
        'totalPrice' => 'required',
        'people' => 'required',
        'totalPrice' => 'min:0',
        'people' => 'numeric', 
        'people' => 'min:0', 
    ]);
    
    if(empty($errors)){
        $amount = $form->get('totalPrice', '');
        $numPeople = $form->get('people', '');
        $service = $form->get('service', '');
        $roundBill;
        
        if (isset($_GET["roundBill"])){
            $roundBill = true;
        } else {
            $roundBill = false;
        }
        
        $bill = new Bill($amount, $numPeople, $service, $roundBill);
        
        $split;
        if($bill->shouldRound()){
            $split = $bill->amountOwedRounded();
        } else {
            $split = $bill->amoutOwed();
        }
    }
}