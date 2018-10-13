<?php

namespace App\Http\Controllers;

use App\Clients;
use App\Orders;
use App\OrdersDetails;
use App\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class OrderController extends Controller
{
    //
    public function allOrders(Orders $orders, OrdersDetails $details)
    {
        $orders = $orders->all();
        return view('admin.orders.index', compact('orders'));
    }

    public function createOrder(Clients $clients)
    {
        return view('admin.orders.add');
    }

    public function orderPrice($id, Stock $stock)
    {
        $stock = $stock->where('id', $id)->select('selling_price', 'quantity', 'goods_name')->get()[0];
        return response($stock);
    }

    public function storeOrder(Orders $orders, OrdersDetails $details, Request $request, Stock $stock)
    {
        //dd($request->client);
        $count = count($request->quantity);
        $data = [''];
        $create = $orders->create([
            'total' => $request->total,
            'client_id' => $request->client
        ]);
        $id = $create->id;
        for ($i=0; $i < $count; $i++){
            if ($request->stock[$i] != '' & $request->quantity[$i] != ''){
                $selling_price =  $stock->where('id', $request->stock[$i])->get()[0];
                $data =  [
                    'orders_id' => $id,
                    'stock_id' => $request->stock[$i],
                    'quantity' => $request->quantity[$i],
                    'amount' => $selling_price->selling_price * $request->quantity[$i],
                ];
                $details->create($data);

                $oldQuantity = $stock->where('id', $request->stock[$i]);
                $newQuantity = $oldQuantity->get()[0]->quantity - $request->quantity[$i];
                $oldQuantity->update(['quantity' => $newQuantity]);
            }
        }

        return Redirect::back()->withSuccess('The order is successfully created');
    }

    public function showOrder($id, Orders $orders, OrdersDetails $ordersDetails)
    {
        $order = $orders->where('id', $id)->get()[0];
        $details = $orders->find($id)->details()->get();
        return view('admin.orders.show', compact('order', 'details'));
    }

    public function billOrder($id, Orders $orders, OrdersDetails $ordersDetails)
    {
        $order = $orders->where('id', $id)->get()[0];
        $details = $orders->find($id)->details()->get();
        return view('admin.orders.bill', compact('order', 'details'));
    }

    public function destroyOrder($id, Orders $orders, OrdersDetails $details)
    {
        $details->where('orders_id', $id)->delete();
        $orders->where('id', $id)->delete();
        return Redirect('/orders')->withSuccess('The order is successfully deleted');
    }

}
