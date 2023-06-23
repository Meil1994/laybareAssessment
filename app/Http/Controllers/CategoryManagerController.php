<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\QueryException;
use Illuminate\Validation\ValidationException;

class CategoryManagerController extends Controller
{
    public function categoryManager()
    {
        $categories = Category::orderBy('category_name')->get();
        return view('category_manager.CategoryManager', compact('categories'));
    }

    public function deleteCategory($id)
    {
        $category = Category::find($id);
        if ($category) {
            $category->delete();
            return redirect()->back()->with('success', 'User deleted successfully.');
        }
        return redirect()->back()->with('error', 'User not found.');
    }

    public function editCategory(Category $category)
    {
        return view('category_manager.EditCategory', compact('category'));
    }

    public function updateCategory(Request $request, Category $category)
    {
        try {
        $validatedData = $request->validate([
            'category_name' => 'required|unique:categories,category_name,' . $category->id,
            'category_description' => 'required',
            'product_manager' => 'required',
        ], [
            'category_name.required' => 'Please enter a category name.',
            'category_name.unique' => 'The category name is already taken.',
            'category_description' => 'Please enter a category description.',
            'product_manager' => 'Please enter a product manager.',
        ]);

        $category->update($validatedData);

        if ($category->wasChanged()) {
            return response()->json([
                'message' => 'Category updated successfully!',
            ]);
        } else {
            return response()->json([
                'message' => 'No changes were made to the categories.',
            ]);
        }
        } catch (ValidationException $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], 422);
        }
    }

    public function addCategory()
    {
        $errors = new MessageBag;

        return view('category_manager.NewCategory')->withErrors($errors);
    }

    
    public function storeCategory(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'category_name' => 'required|unique:categories,category_name',
                'category_description' => 'required|string',
                'product_manager' => 'required|string',
            ]);

            $category = Category::create([
                'category_name' => $validatedData['category_name'],
                'category_description' => $validatedData['category_description'],
                'product_manager' => $validatedData['product_manager'],
            ]);

            return response()->json([
                'message' => 'Category created successfully!',
                'category' => $category
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 422);
        }
    }

}
