<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TipController extends Controller
{
    public function index(){
        return view('calculator.show');
    }
    
    public function processForm(){
        return 'check form and redirect';
    }
    
    public function show($title = null){
        return view('book.show')->with(['title' => $title]);
    }
}
