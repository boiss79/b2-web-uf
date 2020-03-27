<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index(){

        return view('admin.users.index', [
            "users" => User::all(),
        ]);
    }
}
