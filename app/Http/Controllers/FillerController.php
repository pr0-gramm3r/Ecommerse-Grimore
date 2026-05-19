<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use App\Models\Merchant;
use Illuminate\Support\Facades\Auth;

class FillerController extends Controller
{
    public function showAddProduct(){
        return view('merchant.product_add');
    }
    public function addProduct(Request $req) {
        $req->validate([
            'product_name'        => 'required|string|max:255',
            'product_description' => 'required|string',
            'product_keyword'     => 'required|string|max:500',
            'category_id'         => 'required|in:1,2,3',
            'Season_id'           => 'required|in:1,2,3,4',
            'product_price'       => 'required|numeric|min:10',
            'product_status'      => 'required',
            'product_stock'       => 'required',
            'Method'              => 'required',

        ]);
        $imgurl = [];

        if ($req->Method === 'upload') {
            foreach (['image_1', 'image_2', 'image_3', 'image_4'] as $key) {
                if ($req->hasFile($key)) {
                    $uploaded = Cloudinary::upload($req->file($key)->getRealPath());
                    $imgurl[] = $uploaded->getSecurePath();
                } else {
                    $imgurl[] = null; // ✅ keep indexes consistent
                }
            }
        } elseif($req->Method === 'url'){
            $imgurl[] = $req->input('image_url_1') ?: null;
            $imgurl[] = $req->input('image_url_2') ?: null;
            $imgurl[] = $req->input('image_url_3') ?: null;
            $imgurl[] = $req->input('image_url_4') ?: null;
        }
        // dd($imgurl[0]);
        Product::create([
            'product_name'        => $req->product_name,
            'product_description' => $req->product_description,
            'product_keywords'    => $req->product_keyword,
            'category_id'         => $req->category_id,
            'season_id'           => $req->Season_id,
            'merchant_id'         => Auth::guard('merchant')->user()->id,
            'product_image1'             => $imgurl[0] ?? null, // ✅ clean and simple
            'product_image2'             => $imgurl[1] ?? null,
            'product_image3'             => $imgurl[2] ?? null,
            'product_image4'             => $imgurl[3] ?? null,
            'product_price'       => $req->product_price,
            'product_stock'       => $req->product_stock,
            'product_status'      => $req->product_status ?? 'active',
        ]);
        return redirect()->back()->with('success', 'Product added successfully!');
    }

    public function removeProduct(Product $product){
        if ($product->merchant_id !== Auth::guard('merchant')->id()) {
            abort(403);
        }

        $product->delete();

        return redirect()->route('merchant.dashboard')->with('success', 'Product removed successfully!');
    }
}
