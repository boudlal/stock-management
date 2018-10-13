<?php

namespace App\Http\Controllers;

use App\Clients;
use App\Orders;
use App\Providers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ClientController extends Controller
{
    public function allClients(Clients $clients)
    {
        $clients = $clients->all();
        return view('admin.clients.index', compact('clients'));
    }

    public function createClient(Clients $clients)
    {
        $clients = $clients->orderBy('id', 'asc')->take(5)->get();
        return view('admin.clients.add', compact('clients'));
    }

    public function storeClient(Clients $clients, Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'email',
            'cin' => 'min:6',
            'phone' => 'min:8|numeric',
            'city' => 'required'
        ]);

        $clients->create($request->all());

        return Redirect::back()->withSuccess('the Client is successfully added');
    }

    public function editClient($id, Clients $clients, Orders $orders)
    {
        $client = $clients->find($id);
        $orders = $orders->where('client_id', $id)->orderBy('id', 'desc')->take(8)->get();
        return view('admin.clients.edit', compact('client', 'orders'));
    }

    public function updateClient($id, Clients $clients, Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'email',
            'cin' => 'min:6',
            'phone' => 'min:8|numeric',
            'city' => 'required'
        ]);
        $data = array_except($request->all(), ['_method', '_token']);
        //dd($data);
        $clients->find($id)->update($data);
        return Redirect::back()->withSuccess('the Client is successfully updated');
    }

    public function destroyClient($id, Clients $clients)
    {
        $clients->find($id)->delete();
        return Redirect('/clients')->withSuccess('the Client is successfully deleted');
    }




}
