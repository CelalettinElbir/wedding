<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\user;
use Illuminate\Http\Request;

class userCrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allUsers = user::all();
        return view("admin.user.index", compact("allUsers"));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function show(user $user)
    {
        return view("admin.user.show", compact("user"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(user $user)
    {
        return view("admin.user.edit", compact("user"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, user $user)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
        $updatedUser = user::find($user->id);

        $updatedUser->name = $request->name;
        $updatedUser->email = $request->email;
        $updatedUser->save();

        return redirect()->route("admin.user.index")->with("message", "Başarıyla güncellendi");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $user)
    {
        if ($user->id !== null) {
            user::where("id", $user->id)->delete();
            return back()->with("message", "başarıyla silindi");
        } else {

            return back()->with("error", "bilinmeten bir problem oluştu.");
        }
    }
}
