<?php

namespace App\Http\Controllers;

use App\Models\company;
use App\Models\companyimages;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("company.index", ['data' => company::all()]);
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


        $files = $request->files;
        $validated = $request->validate([
            'name' => 'required',
            "company_name" => 'required',
            "telno" => 'required',
            "description" => 'required',
            'email' => 'required|email',
            "password" => 'required|confirmed',
            "capasity" => 'required',
            "mealcapacity" => 'required',
            "price" => 'required',
            "location" => 'required',
        ]);


        // $data["password"] = bcrypt($data['password']);


        $company = company::create($validated);
        foreach ($request->file('file_path') as $item) {
            $image = new companyimages();
            $path = $item->store('/images/resource', ['disk' =>   'my_files']);
            $image->url = $path;
            $image->company_id = $company->id;
            $image->save();
        };



        // auth()->login($company);
        return redirect()->route("home")->with("message", "firma başarıyla oluşturuldu!!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(company $company)


    {
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
