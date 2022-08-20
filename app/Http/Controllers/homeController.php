<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class homeController extends Controller
{
    
    public function index(){
        return view("home.index");

    }

    public function company_index(){

        return view("company.index");

        
    }


}
