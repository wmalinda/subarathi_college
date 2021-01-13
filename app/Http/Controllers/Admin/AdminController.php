<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller{

    public function __construct(){

    }

    public function login(){
        return view('login');
    }

    public function register(){
        return view('register');
    }
}
