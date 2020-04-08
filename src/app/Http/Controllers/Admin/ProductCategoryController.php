<?php

namespace App\Http\Controllers\Admin;

use App\ProductCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProductCategory;

class ProductCategoryController extends Controller
{
    public function index() {
        return view('admin.categories.index', [
            'categories' => ProductCategory::all()
        ]);
    }

    public function edit(ProductCategory $category) {
        return view('admin.categories.edit', [
            'category' => $category
        ]);
    }

    public function update(ProductCategory $category, UpdateProductCategory $request) {
        $validated = $request->validated();
        $category->update($validated);

        return redirect()->route('admin.categories.index')->with('green', 'La catégorie a bien été modifiée.');
    }

    public function destroy(ProductCategory $category) {
        $category->delete();
        
        return redirect()->route('admin.categories.index')->with('green', 'La catégorie a bien été supprimée.');
    }
}
