<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use App\ProductComment;
use App\ProductCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

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

    public function show(Product $product) {
        return view('admin.products.show', [
            'product' => $product
        ]);
    }

    public function update(Product $product) {
        $product->update([
            'published_at' => now()
        ]);

        return redirect(route('admin.products.index'))->with('green', 'Le produit a bien été approuvé.');
    }

    public function destroy(Product $product) {
        Storage::delete($product->url_sheet);
        $product->delete();

        return redirect(route('admin.products.index'))->with('green', 'Le produit a bien été supprimé.');
    }
}
