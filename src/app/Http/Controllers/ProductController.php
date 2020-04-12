<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductRating;
use App\ProductComment;
use App\ProductCategory;
use App\ProductPurchased;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProduct;
use App\Http\Requests\UpdateProduct;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('products.index', [
            'categories' => ProductCategory::all()
        ]);
    }

    public function indexByCategory(ProductCategory $category) {
        return view('products.category.index', [
            'products' => $category->approvedProducts,
            'category' => $category
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create', [
            'categories' => ProductCategory::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProduct $request)
    {
        $validated = $request->validated();
        $data = array_merge($validated, [
            'owner_id' => Auth::id(),
            'url_sheet' => Storage::putFile('products', $request->file('url_sheet'))
        ]);

        Product::create($data);

        return redirect()->route('products.index')->with('green', 'Le produit a bien été publié.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        if (!$product->published_at) {
            return redirect()->back()->with('red', 'Le produit n\'existe pas.');
        }

        return view('products.show', [
            'product' => $product,
            'comments' => ProductComment::where(['product_id' => $product->id])->get(),
            'average' => round(ProductComment::where(['product_id' => $product->id])->avg('rating'))
        ]);
    }

    public function download($filename) {
        $isProductPurchased = ProductPurchased::where(['url_sheet' => 'products/' . $filename, 'buyer_id' => Auth::id()])->first();

        if (!$isProductPurchased) {
            return redirect()->route('home')->with('red', 'Vous n\'êtes pas autorisé à réaliser cette action.');
        }

        return Storage::download('products/' . $filename);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $this->authorize('update', $product);
        
        return view('products.edit', [
            'product' => $product,
            'categories' => ProductCategory::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProduct $request, Product $product)
    {
        $this->authorize($product);

        $validated = $request->validated();
        if (is_null($request->file('url_sheet'))) {
            $product->update($validated);
        }
        else {
            Storage::delete($product->url_sheet);
            $data = array_merge($validated, [
                'url_sheet' => Storage::putFile('products', $request->file('url_sheet'))
            ]);
            $product->update($data);
        }

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $this->authorize('delete', $product);

        Storage::delete($product->url_sheet);
        $product->delete();

        return redirect()->route('products.index');
    }
}
