<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // List all products
    public function index() {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    // Show the form to create a new product
    public function create() {
        return view('admin.products.create');
    }

    // Store the new product in the database
    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        Product::create([
            'name' => $request->name,
            'amount' => $request->amount,
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        return redirect()->route('products.index');
    }

    // Show the form to edit a product
    public function edit($id) {
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }

    // Update the product in the database
    public function update(Request $request, $id) {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $product->image = $imagePath;
        }

        $product->update($request->only('name', 'amount', 'description'));

        return redirect()->route('products.index');
    }

    // Show a product detail page
    public function show($id) {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }
}
