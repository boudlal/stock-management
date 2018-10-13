<?php

namespace App\Http\Controllers;

use App\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class StockController extends Controller
{
    //
    public function allStock(Stock $stock)
    {
        $stock = $stock->all();
        return view('admin.stock.index', compact('stock'));
    }

    public function createStock(Stock $stock)
    {
        $stock = $stock->orderBy('id', 'desc')->take(5)->get();
        return view('admin.stock.add', compact('stock'));
    }

    public function storeStock(Stock $stock, Request $request)
    {
        $this->validate($request, [
            'goods_name' => 'required|unique:stock',
            'quantity' => 'required|integer',
            'base_price' => 'required|integer',
            'selling_price' => 'required|integer',
            'status' => 'required'
        ]);
        $data = [
            'goods_name' => $request->goods_name,
            'quantity' => $request->quantity,
            'base_price' => $request->base_price,
            'selling_price' => $request->selling_price,
            'status' => $request->status,
            'notifications' => 1,
        ];

        $stock->create($request->all());

        return Redirect('/stock')->withSuccess('The stock is successfully updated');
    }

    public function editStock($id, Stock $stock)
    {
        $stock = $stock->where('id', $id)->get()[0];
        return view('admin.stock.edit', compact('stock'));
    }

    public function updateStock($id, Stock $stock, Request $request)
    {
        $this->validate($request, [
            'goods_name' => 'required',
            'quantity' => 'required|integer',
            'base_price' => 'required|integer',
            'selling_price' => 'required|integer',
            'status' => 'required'
        ]);

        $stock->where('id', $id)->update(array_except($request->all(), ['_method', '_token']));
        $stock->where('id', $id)->update(['notifications' => 1]);
        return Redirect('/stock')->withSuccess('The stock is successfully updated');
    }

    public function destroyStock($id, Stock $stock)
    {
        $stock->find($id)->delete();
        return Redirect('/stock')->withSuccess('The stock is successfully updated');
    }

    public function stockNotifications($id, Stock $stock)
    {
        $stock->find($id)->update(['notifications' => 0]);
        return Redirect('/stock');
    }
}
