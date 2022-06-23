<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Cart;
use Validator;

class CartController extends Controller
{
    public function index()
    {
        $slug = null;
        $mightAlsoLike = Product::where('slug', '!=', $slug)->mightAlsoLike()->get();
        $items = Cart::content();
        return view('front.cart.index')->with([
            'mightAlsoLike' => $mightAlsoLike,
            'cartCollection' => $items,
        ]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'quantity' => 'required|numeric|between:1,10'
        ]);

        if ($validator->fails()) {
            session()->flash('errors', collect(['Quantity must be between 1 and 10.']));
            return response()->json(['success' => false], 400);
        }

        if ($request->quantity > $request->productQuantity) {
            session()->flash('errors', collect(['We currently do not have enough items in stock.']));
            return response()->json(['success' => false], 400);
        }

        Cart::update($id, $request->quantity);
        session()->flash('success_message', 'Quantity was updated successfully!');
        return response()->json(['success' => true]);
    }

    public function store(Request $request, $id)
    {
        $data = $request->all();


        if (isset($data['option'])) {
            $attributes = Product::getCartOptions($data['option'],$id);
        }

        $Product = Product::find($id);
        $cart = [
            'id' => $Product->id,
            'name' => $Product->product_name,
            'qty' => $request->qty ? $request->qty : 1,
            'price' => $Product->product_current_price,
            'weight' => 0,
        ];
        if (isset($attributes)) {
            $cart['options'] = $attributes['options'];
            $cart['options']['options_id'] = $attributes['options_id'];
            $optional_total = $cart['price']+$attributes['options_total'];
            $cart['price'] = $optional_total;
        }
        $cartItem = Cart::add($cart)->associate(Product::class);


        return redirect()->route('cart.index')->with('success_message', 'Item was added to your cart!');

    }

    public function destroy($id)
    {
        Cart::remove($id);

        return back()->with('success_message', 'Item has been removed!');
    }
}
