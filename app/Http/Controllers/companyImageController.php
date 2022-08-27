<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\companyimages;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class companyImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Models\companyimages  $companyimages
     * @return \Illuminate\Http\Response
     */
    public function show(companyimages $companyimages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\companyimages  $companyimages
     * @return \Illuminate\Http\Response
     */
    public function edit(companyimages $companyimages)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\companyimages  $companyimages
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, companyimages $companyimages)
    {
        return $request;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\companyimages  $companyimages
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        $selectedImages = DB::table('companyimages')->whereIn('id', $request->selectedImages);


        foreach ($selectedImages->get()  as $item) {
            if (File::exists(public_path('images/resource/' . $item->url))) {
                File::delete(public_path('images/resource/' . $item->url));
            } else {
                return "bilinmeyen bir problem oluştu.";
            }
        }
        $selectedImages->delete();
        return "başarıyla silindi.";


    
    }
}
