<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function basket(Request $request)
    {
        $products = null;
        if($request->session()->has('basket')) {
            $productIds = $request->session()->get('basket');
            $productIds = array_keys($productIds);
            $products = Product::whereIn('id', $productIds)->get();
        }
        return view('users.order.basket', compact('products'));
    }
    public function basketPost(Request $request)
    {
        $basket = $request->input('productsIds');
        $basket = array_filter($basket, function($item) {
            return $item >= 1;
        });
        $request->session()->put('basket', $basket);
        return back();
    }
    public function addBasket(Request $request)
    {
        $basket = [];
        if($request->session()->has('basket'))
            $basket = $request->session()->get('basket');
        $basket[(int) $request->query('productId')] = 1;
        $request->session()->put('basket', $basket);
        return back();
    }
    public function createOrder(Request $request)
    {
        if(!$request->session()->has('basket')) return back()->with('errorCreate', true);
        $order = Order::create([
            'user_id' => Auth::id(),
            'address' => $request->input('address')
        ]);

        $basket = $request->session()->get('basket');
        $basket = array_filter($basket, function($item) {
            return $item >= 1;
        });

        $productIds = array_keys($basket);
        $products = Product::whereIn('id', $productIds)->get();
        foreach($products as $item) {
            $order->items()->create([
                'product_id' => $item->id,
                'price' => $item->price,
                'count' => $basket[$item->id]
            ]);
        }
        $request->session()->forget('basket');
        return redirect()->route('home');
    }
    public function orders($myOrder = 'my')
    {
        $orders = Order::select('*');
        if(Auth::user()->role == 'user' || $myOrder == 'my')
            $orders->where('user_id', Auth::id());

        $orderItems = $orders->get();

        return view('items.orders.view', ['orders' => $orderItems]);
    }
    public function cancel(Order $order)
    {
        if(Auth::user()->role == 'admin') {
            $order->status = 'Отклонен';
            $order->save();
            return back()->with('success', true);
        }
        else if(Auth::id() == $order->user_id) {
            $order->delete();
            return back()->with('delete', true);
        }
        return back()->with('success', false);
    }

    public function completed(Order $order)
    {
        $order->status = 'Завершен';
        $order->save();
        return back()->with('completed', true);
    }
}
