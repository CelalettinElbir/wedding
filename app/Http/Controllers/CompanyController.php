<?php

namespace App\Http\Controllers;

use App\Models\company;
use Illuminate\Http\Request;
use App\Models\companyimages;
use Intervention\Image\Facades\Image;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{

    public function __construct()
    {
        // $this->middleware('company')->except('logout');
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


        $data = company::latest()->filter(request(["max_capasity", "min_capasity", "max_price", "min_price"]))->get();

        return view("company.index", compact("data"));
    }





    public function home()
    {
        // return view("company.home");
        return "DENEME";
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
            return redirect()->route("company.home")->with("message", "sucsessful.");
        }
        return redirect()->action([
            CompanyController::class,
            'companyLogin'
        ])->with('message', 'Credentials not matced in our records!');
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




        return redirect()->route('create_services')->with("succses", "şirket bilgileri başarıyla kaydedildi")
            ->with(['company' => $company]);
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
        return view("company.edit");
        // return "DENEME";
    }

    public function logout(Request $request)
    {

        Auth::guard("company")->logout();


        return redirect('/')->with("message", "şirket başarıyla çıkış yaptı!");
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
