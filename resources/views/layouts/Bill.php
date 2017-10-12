<?php 

namespace Restaurant;

class Bill{
    private $amountOwed;
    private $numberOfPeople;
    private $qualityOfService;
    private $roundBill;
    
    public function __construct($billAmount, $numPeople, $service, $rndBill){
        $this->amountOwed = $billAmount;
        $this->numberOfPeople = $numPeople;
        $this->qualityOfService = $service;
        $this->roundBill = $rndBill;
    }
    
    public function amoutOwed(){
        return ($this->amountOwed * ((100+$this->qualityOfService)/100))/$this->numberOfPeople; 
    }
    
    public function amountOwedRounded(){
        return round(($this->amountOwed * ((100+$this->qualityOfService)/100))/$this->numberOfPeople, 0);
    }
    
    public function shouldRound(){
        return $this->roundBill;
    }
}