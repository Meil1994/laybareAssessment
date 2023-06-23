<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function dashboard(Request $request)
    {
        $category = $request->input('category');
        $sort = $request->input('sort');
        $search = $request->input('search');
        
        $query = Product::query();
        $categories = Category::all();
        
        if ($category) {
            if ($category == 'Show All') {
                // Skip filtering by category
            } else {
                $query->where('product_category', $category);
            }
        }
        
        if ($search) {
            $query->where('product_name', 'like', "%$search%");
        }
        
        if ($sort) {
            $query->orderBy('product_name', $sort);
        }
        
        $products = $query->orderByDesc('updated_at')->paginate(4);
        
        return view('dashboard.Dashboard', compact('products', 'categories'));
    }

    public function singleProduct(Product $product)
    {
        return view('dashboard.SingleProduct', compact('product'));
    }
}
