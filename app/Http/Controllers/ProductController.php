<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Season;


class ProductController extends Controller
{
    // public function __construct()
    
    public function home()
    {
        $products = Product::all();
        $seasons = Season::all();
        $categories = Category::all();
        return view('nav-links.home', compact('products', 'seasons', 'categories'));
    }

    public function products(){
        $products = Product::all();
        
        // return response()->json($products);
        return view('admin.All_products', compact('products'));
    
    }

    public function productDetails($id){
        $product = Product::findOrFail($id);
        return view("nav-links.Product", compact('product'));
    }

    public function search(Request $request)
{
    $query = $request->input('query');

    $products = Product::where('product_name', 'LIKE', "%{$query}%")
                ->orWhere('product_keywords', 'LIKE', "%{$query}%")
                ->get();

    return view('nav-links.search', compact('products', 'query'));
}

   


}
