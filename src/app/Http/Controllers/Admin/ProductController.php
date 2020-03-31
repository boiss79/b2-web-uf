<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use App\ProductComment;
use App\ProductCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index() {
        $nbApprovedProducts = Product::whereNotNull('published_at')->get()->count();
        $nbNotApprovedProducts = Product::whereNull('published_at')->get()->count();

        return view('admin.products.index', [
            'products' => Product::orderBy('published_at')->get(),
            'categories' => ProductCategory::all(),
            'comments' => ProductComment::all(),
            'nbApprovedProducts' => $nbApprovedProducts,
            'nbNotApprovedProducts' => $nbNotApprovedProducts
        ]);
    }
}
