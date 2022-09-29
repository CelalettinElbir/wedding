<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\requests;
use Illuminate\Support\Facades\Auth;

class adminAuthController extends Controller
{
    public function login()
    {

        return view("admin.login");
    }


    public function authenticate(Request $request)
    {
        $credentials = $request->except(['_token']);

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route("admin.panel")->with("message", "başarılı");
        }
        return back()->withInput($request->only('email'))->with("message", "başarısız");
    }


    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        
        return redirect()->route("admin.login")->with("message","admin başarıyla çıktı.");

    }

}
