<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class HomeController extends Controller
{
    public function dashboard(){
        // dd(auth()->user()->getRoleNames());
        return view('dashboard');

        return abort(403);
    }
    public function index(){
        // $data = User::get();

        // return view('index',compact('data'));
    }
}
