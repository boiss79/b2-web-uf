<?php

namespace App\Http\Controllers\Admin;

use App\ProductCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrUpdateProductCategory;

class ProductCategoryController extends Controller
{
    public function index() {
        return view('admin.categories.index', [
            'categories' => ProductCategory::all()
        ]);
    }

    public function create() {
        return view('admin.categories.create');
    }

    public function store(StoreOrUpdateProductCategory $request) {
        $validated = $request->validated();
        ProductCategory::create($validated);

        return redirect()->route('admin.categories.index')->with('green', 'La catégorie a bien été créée.');
    }

    public function edit(ProductCategory $category) {
        return view('admin.categories.edit', [
            'category' => $category
        ]);
    }

    public function update(ProductCategory $category, StoreOrUpdateProductCategory $request) {
        $validated = $request->validated();
        $category->update($validated);

        return redirect()->route('admin.categories.index')->with('green', 'La catégorie a bien été modifiée.');
    }

    public function destroy(ProductCategory $category) {
        $category->delete();
        
        return redirect()->route('admin.categories.index')->with('green', 'La catégorie a bien été supprimée.');
    }
}
