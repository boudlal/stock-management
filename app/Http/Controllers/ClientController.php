<?php

namespace App\Http\Controllers;

use App\Clients;
use App\Orders;
use App\Providers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ClientController extends Controller
{
    public function index(Clients $clients)
    {
        $clients = $clients->all();

        return view('admin.clients.index', compact('clients'));
    }

    public function create(Clients $clients)
    {
        $clients = $clients->orderBy('id', 'asc')->take(5)->get();

        return view('admin.clients.add', compact('clients'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'email',
            'cin' => 'min:6',
            'phone' => 'min:8|numeric',
            'city' => 'required'
        ]);

        Clients::create($request->all());

        return Redirect::back()->withSuccess('the Client is successfully added');
    }

    public function edit($id, Clients $clients, Orders $orders)
    {
        $client = $clients->find($id);
        $orders = $orders->where('client_id', $id)->orderBy('id', 'desc')->take(8)->get();

        return view('admin.clients.edit', compact('client', 'orders'));
    }

    public function update($id, Clients $clients, Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'email',
            'cin' => 'min:6',
            'phone' => 'min:8|numeric',
            'city' => 'required'
        ]);

        $data = array_except($request->all(), ['_method', '_token']);
        $clients->find($id)->update($data);

        return Redirect::back()->withSuccess('the Client is successfully updated');
    }

    public function destroy($id, Clients $clients)
    {
        $clients->find($id)->delete();

        return Redirect()->route('clients.index')->withSuccess('the Client is successfully deleted');
    }
}
