<?php

namespace App\Http\Controllers;

use App\Providers\AuthServiceProvider;
use App\SiteSettings;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //
    public function siteSetting(SiteSettings $settings)
    {
        $settings = $settings->where('status', 0)->get();
        return view('admin.sitesettings.siteSettings', compact('settings'));
    }

    public function updateSetting(SiteSettings $settings, Request $request)
    {
        $this->validate($request, [
            'phone' => 'required|numeric',
            'logo' => 'mimes:png,jpeg,jpg'
        ]);

        //upload Company logo
        $status = '';
        $imageName = '';
        if ($request->file()) {

            $path = base_path() . '/public/admin/websiteImages/';
            $filename = $request->logo->getClientOriginalName();
            $request->logo->move(
                $path, $filename
            );
            $status = true;
            $imageName = $filename;
        }else{
            dd(false);
        }


        foreach (array_except($request->toArray(), ['_token']) as $key => $value) {
            $settings->where('namesetting', $key)->update(['value' => $value]);
            if ($status == true) {
                $update = $settings->where('namesetting', 'logo')->get()[0];
                //dd($update);
                $update->fill(['value' => $imageName])->save();
            }
        }

        return Redirect::back()->withSuccess('The settings is successfully updated');
    }

    public function updateUserEmail(User $user, Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required||min:6'
        ]);
        $status = 'user';
        if (Hash::check($request->password, Auth()->user()->password)) {
            $user->where('id', Auth()->user()->id)->update(['email' => $request->email]);
        }else{
            return Redirect::back()->withErrors(['userPassword' => 'your password is incorrect, try again'])->with('email');
        }

        return Redirect::back()->withSuccess('Your Email is successfully changed');

    }

    public function updateUserPassword(User $user, Request $request)
    {

        if (Hash::check($request->old_password, Auth()->user()->password)){
            $this->validate($request, [
                'old_password' => 'required|min:6',
                'password' => 'required|confirmed|min:6',
                'password_confirmation' => 'required||min:6'
            ]);
            $user->where('id', Auth()->user()->id)->update(['password' => Hash::make($request->password)]);
        }else {
            return Redirect::back()->withErrors(['old_password' => 'your password is incorrect, try again']);
        }

        return Redirect::back()->withSuccess('Your Password is successfully changed');
    }
}
