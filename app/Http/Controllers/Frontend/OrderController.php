<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\order_product;
use App\Models\Order;
use App\Models\City;
use App\Models\Province;
use App\Models\Wards;

class OrderController extends Controller
{
    //
    public function index() {
        $products = Cart::content();
        $Cites = City::get();
        $Provinces = Province::get();
        $Wards = Wards::get();

        return view('frontend.checkout.index')->with([
            'products' => $products,
            'Cites' => $Cites,
            'Provinces' => $Provinces,
            'Wards' => $Wards
        ]);
    }
    public function add(Request $request) {
        $products = Cart::content();
        foreach ($products as $product) {
        }
        $dataUser = $request->all();
        $address = $dataUser['address']." ".$dataUser['ward']." ".$dataUser['province']." ".$dataUser['city'];
        $order = new Order();
        $order->customer_name =  $product->name;
        $order->address = $address;
        $order->user_id =  auth()->user()->id;
        $order->phone = $dataUser['phone'];
        $order->quantity = $product->qty;
        $order->total_price = $product->price;
        $order->status = 1;
        $order->save();
        return redirect()->route('frontend.order.index');
    }
    public function listOrder() {
        $id = auth()->user()->id;
        $orders = Order::where('user_id', $id )->get();
        return view('frontend.order.index')->with([
            'orders' => $orders,
        ]);
    }
    public function destroy($id) {
        $order = Order::find($id);
        $order->delete();
        return redirect()->route('frontend.order.index');

    }

}
