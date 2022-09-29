<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class authcontroller extends Controller
{


    public function __construct()
    {
        $this->middleware("guest:web")->only("create","login");
        
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("user.register");
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            "password" => 'required|confirmed',
        ]);

        $validated["password"] = bcrypt($validated['password']);

        $user = User::create($validated);
        auth()->login($user);
        return redirect()->route("home")->with("message", "Kullancı başarıyla oluşturuldu!!");
    }



    public function login()
    {
        return view("user.login");
    }


    public function authenticate(Request $request)
    {


        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route("home")->with("message", "Başarıyla giriş yaptınız");
        }

        return back()->with("fail", "Bilgiler uyuşmuyor");
    }

    public function logout(Request $request)
    {

        $isCompany = Auth::guard("company")->check();
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        if ($isCompany) {
            return redirect('/')->with("message", "Şirket başarıyla çıkış yaptı!");
        }
        return redirect('/')->with("message", "Kullanıcı başarıyla çıkış yaptı!");
    }
}