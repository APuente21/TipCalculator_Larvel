<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TipController extends Controller {
    //controller returns the view to display the calculator
    public function index(Request $request){ 
        $split = null;
        return view('calculator.show')->with([
            'split' => $split
        ]); 
    }
    
    /*Controller perform the form validation. Assuming the form is 
    validated, it then redirects to another controller, with 
    the parameter $split
    */
    public function processForm(Request $request){
        $this->validate($request, [
            'totalPrice' => 'required|numeric|min:0',
            'people' => 'required|numeric|min:1'
        ]);
        $numPeople = $request->input("people");
        $price = $request->input("totalPrice");
        $round = $request->input("roundBill");
        $tip = $request->input("service");
        
        $split = ($price*(100+$tip)/100)/$numPeople;
        
        if($request->input("roundBill")=="on"){
            $split = round($split);
        }
        return redirect()->action(
            'TipController@result',['amount' => $split]);
    }
    
    //passes the validated $split varibale to calculator view
    public function result($amount){
        return view('calculator.show')->with([
            'split' => $amount
        ]); 
    }
}
