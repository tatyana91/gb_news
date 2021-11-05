<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }

    public function test1(){
        return view('admin.test1');
    }

    public function test2(){
        return view('admin.test2');
    }
}
