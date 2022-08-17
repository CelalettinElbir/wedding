<?php

namespace App\Http\Controllers;

use App\Models\company;
use Illuminate\Http\Request;
use App\Models\companyimages;
use Intervention\Image\Facades\Image;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\ValidatedData;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(request());
        // return view("company.index", ['data' => company::latest()->get()]);
        
        
        $data = company::latest()->filter(request(["max_capasity","min_capasity","max_price","min_price"]))->get();

        return view("company.index",compact("data"));
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view("company.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $validated = $request->validate([
            'name' => 'required',
            "company_name" => 'required',
            "telno" => 'required',
            "description" => 'required',
            'email' => 'required',
            "password" => 'required|confirmed',
            "capasity" => 'required',
            "mealcapacity" => 'required',
            "price" => 'required',
            "location" => 'required',
            // "file_path" => 'required|image|mimes:jpg,jpeg,png,svg,gif|max:2048',
        ]);


        // $data["password"] = bcrypt($data['password']);

        $company = company::create($validated);


        foreach ($request->file('file_path') as $item) {
            $image = new companyimages();


            $ogImage = Image::make($item->path());
            $ogImage->resize(720, 720);
            // $thImage = $ogImage->save(public_path("/images/resource/") . $item->getClientOriginalName());
            $imageName =  uniqid() . "." . $item->getClientOriginalExtension();
            $ogImage->save(public_path("/images/resource/") . $imageName);
            $image->company_id = $company->id;
            $image->url =  $imageName;
            $image->save();
        };




        return redirect('/')->with('message', 'hello');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(company $company)


    {
        // dd($company);
        return view("company.show", ["company" => $company]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, company $company)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(company $company)
    {
        //
    }
}
