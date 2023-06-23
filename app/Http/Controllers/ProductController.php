<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class ProductController extends Controller
{
    public function productManager()
    {
        $products = Product::orderByDesc('updated_at')->get();
        return view('product_manager.ProductManager', compact('products'));
    }

    public function deleteProduct($id)
    {
        $product = Product::find($id);
        if ($product) {
            $product->delete();
            return redirect()->back()->with('success', 'User deleted successfully.');
        }
        return redirect()->back()->with('error', 'User not found.');
    }

    public function editProduct(Product $product)
    {
        return view('product_manager.EditProduct', compact('product'));
    }

    public function addProduct()
    {
        $categories = Category::all();
        return view('product_manager.NewProduct', compact('categories'));
    }

    public function storeProduct(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'product_name' => 'required|string|max:255',
                'product_sku' => 'required|string|unique:products,product_sku|max:255',
                'product_category' => 'required|string|max:255',
                'product_description' => 'required|string|max:255',
                'product_image' => 'required|image', 
            ]);

            if ($request->hasFile('product_image')) {
                $logoFile = $request->file('product_image');
                $logoPath = $logoFile->store('uploads', 'public');
                $validatedData['product_image'] = $logoPath;
            }

            $product = Product::create($validatedData);

            return response()->json([
                'message' => 'Product created successfully!',
                'product' => $product
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], 422);
        }
    }


    public function updateProduct(Request $request, Product $product)
    {
        try {
            $validatedData = $request->validate([
                'product_name' => 'required|string|max:255',
                'product_sku' => 'required|string|unique:products,product_sku,' . $product->id . ',id|max:255',
                'product_category' => 'required|string|max:255',
                'product_description' => 'required|string|max:255',
                'product_image' => 'nullable|image', 
            ]);

            if ($request->hasFile('product_image')) {
                Storage::disk('public')->delete($product->product_image);

                $validatedData['product_image'] = $request->file('product_image')->store('uploads', 'public');
            }

            $product->update($validatedData);

            if ($product->wasChanged()) {
                return response()->json([
                    'message' => 'Product updated successfully!',
                    'product' => $product
                ]);
            } else {
                return response()->json([
                    'message' => 'No changes were made to the product.',
                ]);
            }
        } catch (ValidationException $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], 422);
        }
    }


}
