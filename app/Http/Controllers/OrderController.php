<?php

namespace App\Http\Controllers;

use Alert;
use App\Mail\EnquirySent;
use App\Mail\OrderDispatched;
use App\Models\Order;
use Illuminate\Http\Request;
use App\DataTables\OrderDataTable;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function index(OrderDataTable $dataTable, Request $request)
    {
        return $dataTable->render('admin.orders.index');

    }

    public function orderDispatch(Request $request, Order $order)
    {
        $order = Order::find($request->order_id);
        $order->dispatched = 1;
        $order->save();
        Mail::to($order->user->email)->queue(new OrderDispatched($order));
        Alert::success('Order dispatched successful!', 'Success');
        return redirect()->route('admin.dashboard');
    }
}
