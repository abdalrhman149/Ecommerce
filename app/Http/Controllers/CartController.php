<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Orderdetails;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart()
    {
        $user_id = auth()->user()->id;
        $cartproduct = Cart::with('Product')->where('user_id', $user_id)->get();

        return view('product.cart', ['cartproduct' => $cartproduct]);
    }

    public function Completeorder()
    {
        $user_id = auth()->user()->id;
        $cartproduct = Cart::with('Product')->where('user_id', $user_id)->get();

        return view('product.Completeorder', ['cartproduct' => $cartproduct]);
    }
    public function Storeorder(Request $request)
    {
        $user_id = auth()->user()->id;

        $newOrder = new Order();

        $newOrder->name = $request->name;
        $newOrder->email = $request->email;
        $newOrder->phone = $request->phone;
        $newOrder->note = $request->note;
        $newOrder->address = $request->phone;
        $newOrder->user_id = $user_id;

        $newOrder->save();


        $cartproduct = Cart::with('Product')->where('user_id', $user_id)->get();

        foreach ($cartproduct as $item) {
            $newOrderDetail = new Orderdetails();
            $newOrderDetail->product_id = $item->product_id;
            $newOrderDetail->price = $item->Product->price;
            $newOrderDetail->quantity = $item->quantity;
            $newOrderDetail->order_id = $newOrder->id;

            $newOrderDetail->save();
        }

        Cart::where('user_id', $user_id)->delete();

        return redirect('/');
    }
    public function Previousorder()
    {
        $user_id = auth()->user()->id;

       $reselt =Order::with('Orderdetails')->where('user_id',$user_id)->get();
        return view('product.previousorder',['orders'=>$reselt]);
    }
}
