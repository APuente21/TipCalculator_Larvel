<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TipController extends Controller
{
    public function index(){
        return 'Show form';
    }
    
    public function processForm(){
        return 'check form and redirect';
    }
    
    public function show(){
        return 'view test';
    }
}
