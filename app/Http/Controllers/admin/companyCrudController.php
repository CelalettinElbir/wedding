<?php

namespace App\Http\Controllers\admin;

use App\Models\company;
use Illuminate\Http\Request;
use App\Models\companyimages;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class companyCrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allCompanies = company::all();
        return view("admin.company.index", compact("allCompanies"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return "deneme";
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(company $company)
    {
        return view("admin.company.show", compact("company"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(company $company)
    {
        return view("admin.company.edit", compact("company"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, company $company)
    {
        $updatedCompany = company::find($company->id);

        $validated = $request->validate([
            'name' => 'required',
            "company_name" => 'required',
            "telno" => 'required',
            "description" => 'required',
            'email' => 'required',
            "capasity" => 'required',
            "mealcapacity" => 'required',
            "price" => 'required',
            "location" => 'required',
        ]);


        $updatedCompany->name = $request->name;
        $updatedCompany->company_name = $request->company_name;
        $updatedCompany->telno = $request->telno;
        $updatedCompany->description = $request->description;
        $updatedCompany->capasity = $request->capasity;
        $updatedCompany->mealcapacity     = $request->mealcapacity;
        $updatedCompany->price   = $request->price;
        $updatedCompany->location = $request->location;
        $updatedCompany->email   = $request->email;
        $updatedCompany->save();


        if ($request->hasFile('file_path')) {
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
        }

        return redirect()->route("admin.company.index")->with("message", "Başarıyla güncellendi");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(company $company)
    {
        if ($company->id !== null) {

            company::where("id", $company->id)->delete();
            return back()->with("message", "başarıyla silindi");
        } else {

            return back()->with("message", "bilinmeten bir problem oluştu.");
        }
    }
}
