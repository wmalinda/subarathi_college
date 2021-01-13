<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function dashboard(){
        $data['title'] = 'Dashboard';
        $data['slug'] = 'dashboard';
        $data['sub_page'] = 'Dashboard';
        return view('admin.dashboard', $data);
    }
}
