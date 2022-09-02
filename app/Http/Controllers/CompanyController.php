<?php

namespace App\Http\Controllers;

use App\Models\company;
use Illuminate\Http\Request;
use App\Models\companyimages;
use Intervention\Image\Facades\Image;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{



    public function __construct()
    {
        $this->middleware(["guest:company"])->only(["create", "companyLogin", "companyAuth"]);
        $this->middleware("auth:company")->only(["home", "edit", "logout", "update"]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(request());
        // return view("company.index", ['data' => company::latest()->get()]);


        $data = company::latest()->filter(request(["max_capasity", "min_capasity", "max_price", "min_price"]))->paginate(5);

        return view("company.index", compact("data"));
    }





    public function home()
    {
        return view("company.home");
        // return "DENEME";
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


    public function companyLogin()
    {

        return view("company.login");
    }

    public function companyAuth(Request $request)
    {

        $credentials = $request->except(['_token']);
        // dd( $credentials );
        if (Auth::guard('company')->attempt($credentials)) {
            return redirect()->intended();
        }
        return back()->withInput($request->only('email', 'remember'));
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


        $validated["password"] = bcrypt($validated['password']);

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

        if (Auth::guard('company')->attempt($request->only(['email', 'password']))) {

            return redirect()->route('service.create')->with("succses", "Şirket bilgileri başarıyla kaydedildi")
                ->with(['company' => $company]);
        }
        return back()->withInput($request->only('email', 'remember'));
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
        if (auth::guard("company")->user()->id === $company->id) {

            return view("company.edit");
        }
        return back()->with("message", "Giriş reddedildi");
        // return "DENEME";
    }





    public function logout(Request $request)
    {

        Auth::guard("company")->logout();


        return redirect('/')->with("message", "Şirket başarıyla çıkış yaptı!");
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

        $updatedCompany = company::find($company->id);

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

        return redirect()->route("company.home")->with("message", "Başarıyla güncellendi");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(company $company)
    {
        //id yi alıp db de sileceğimç

        // company::where("id", $company->id)->delete();
        // return 
    }
}
