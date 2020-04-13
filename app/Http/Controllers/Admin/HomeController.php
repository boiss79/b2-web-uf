<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Product;
use App\ProductComment;
use App\ProductCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){
        return view('admin.home', [
            'users'=>User::all(),
            'comments'=>ProductComment::all(),
            'products'=>Product::all(),
            'categories'=>ProductCategory::all(),
        ]);
    }
}
