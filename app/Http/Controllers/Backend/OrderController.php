<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Brian2694\Toastr\Facades\Toastr;


class OrderController extends Controller
{
    //
    public function index() {
        $orders = Order::get();
        // dd($orders);
        return view('backend.orders.index')->with([
            'orders' => $orders,
        ]);
    }
    public function updateStatus(Request $request,$id) {
            // dd($id);
            $data = $request->all();
            // dd( $data['status']);
            $order=Order::find($id);
            $order->status = $data['status'];
            $order->update();
            Toastr::success('Chỉnh Sửa Trạng Thái Thành Công', 'Thành Công', ["positionClass" => "toast-top-right"]);
            return redirect()->route('backend.orders.index');

    }
}
