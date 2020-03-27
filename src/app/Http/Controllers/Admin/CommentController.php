<?php

namespace App\Http\Controllers\Admin;

use App\ProductComment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function index(){

        return view('admin.comments.index', [
            "comments" => ProductComment::all()
        ]);
    }
}
