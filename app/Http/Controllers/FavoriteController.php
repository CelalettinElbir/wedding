<?php

namespace App\Http\Controllers;

use App\Models\company;
use App\Models\favorite;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use function PHPSTORM_META\map;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //login olan kullanıcının favorilerini getirdim .
        // $user_favs = favorite::where("user_id", auth::user()->id)->get();
        // dd($user_favs->takeCompany());
        //company id dem detayları bulmam gerekiyor.
        // company::where("company_id",$user_favs );

        //compani id
        foreach (auth::user()->favorites as $item) {
            dd($item);

        }   



        // return view("favorite.index", ["favorites" => $user_favs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request 
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Company $company)
    {

        //favorilerde var mı ?
        $isexist = favorite::where('user_id', '=', auth::user()->id)->where("company_id", "=", $company->id)->exists();

        if ($isexist == true) {

            return back()->with("message", "favorile çoktan eklendi.");
        } else {
            if (auth()->check()) {
                $favoriteCompany = new favorite();
                $favoriteCompany->company_id = $company->id;
                $favoriteCompany->user_id = auth::user()->id;
                $favoriteCompany->save();
            }
            return redirect("/company")->with("message", "favorilere başarıyla eklendi!!");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function show(favorite $favorite)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function edit(favorite $favorite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, favorite $favorite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function destroy(favorite $favorite)
    {
        //
    }
}
