<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers;
use Illuminate\Support\Facades\Redirect;

class ProviderController extends Controller
{
    //

    public function allProviders(Providers $providers)
    {
        $providers = $providers->all();
        return view('admin.providers.index', compact('providers'));
    }

    public function createProvider(Providers $providers)
    {
        $providers = $providers->orderBy('id', 'asc')->take(5)->get();
        return view('admin.providers.add', compact('providers'));
    }

    public function storeProvider(Providers $providers, Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'email',
            'cin' => 'min:6',
            'phone' => 'min:8|numeric',
            'city' => 'required'
        ]);

        $providers->create($request->all());

        return Redirect::back()->withSuccess('the Provider is successfully added');
    }

    public function editProvider($id, Providers $providers)
    {
        $providers = $providers->find($id);
        $count = $providers->orderBy('id', 'asc')->take(5)->get();
        return view('admin.providers.edit', compact('providers','count'));
    }

    public function updateProvider($id, Providers $providers, Request $request)
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
        $providers->find($id)->update($data);
        return Redirect::back()->withSuccess('the Provider is successfully updated');
    }

    public function destroyProvider($id, Providers $providers)
    {
        $providers->find($id)->delete();
        return Redirect('/providers')->withSuccess('the Provider is successfully deleted');
    }

}
