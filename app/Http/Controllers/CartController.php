<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;

class CartController extends Controller
{
     // cart functions

    public function showCart(){
        $products = Product::findorFail(auth()->id());
        $cartItems = Cart::where('user_id', auth()->id())->get();
        return view('nav-links.Cart', compact('cartItems'));
        // return response()->json($cartItems);
    }

    public function addToCart(Request $request, $id){
        $product = Product::findOrFail($id);
        $request->validate([
            'quantity' => 'required|integer|min:1|max:20',
        ]);
        $quantity = $request->input('quantity');

            // Create or update the cart item
        // Check if item already exists in cart
        $cartItems = Cart::where('user_id', auth()->id())
            ->where('product_id', $product->id)
            ->first();

        if ($cartItems) {
            // Add new quantity to existing quantity
            $cartItems->quantity += $quantity;
            if($cartItems->quantity > 20){
                $cartItems->quantity = 20; // Set to max limit if it exceeds
            }
            $cartItems->save();
        } else {
            // Create new cart item
            Cart::create([
                'user_id' => auth()->id(),
                'product_id' => $product->id,
                'quantity' => $quantity,
                'price' => $product->product_price
            ]);
        }

        if ($request->ajax()) {
            return response()->json(['success' => true, 'message' => 'Product added to cart successfully!']);
        }

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function removeFromCart($id){
        $cartItem = Cart::where('user_id', auth()->id())
            ->where('product_id', $id)
            ->first();

        if ($cartItem) {
            $cartItem->delete();
            return back()->with('success', 'Product removed from cart successfully!');
        }

        return back()->with('error', 'Product not found in cart.');
    }

    public function updateQuantity(Request $request, $id){
        $request->validate([
            'quantity' => 'required|integer|min:1|max:20',
        ]);

        $cartItem = Cart::findOrFail($id);
        $cartItem->quantity = $request->quantity;
        $cartItem->save();

        return response()->json([
            'success' => true
        ]);
    }

    public function buyNow(Request $request){
        $cartItems = Cart::where('user_id', auth()->id())->get();
        foreach($cartItems as $item){
            $item->delete();
        }
        return back()->with('success', 'Purchase successful! Your cart has been cleared.');
    }
}
