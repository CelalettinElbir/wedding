<?php

namespace App\Http\Controllers;

use App\Models\company;
use App\Models\service;
use Illuminate\Http\Request;

class serviceController extends Controller
{

    public function __construct()
    {
        $this->middleware("auth:company")->only("edit");
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $company = session()->get('company');
        return view("service.create", compact("company"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request);
        $request->validate([
            'addMoreInputFields.*.subject' => 'required'
        ]);

        foreach ($request->addMoreInputFields  as $item) {
            $service = new service;
            $service->company_id = $request->company;
            $service->feature = $item["subject"];
            $service->save();
        };
        return back()->with("message", "şirket ve özellikleri başarıyla oluşturuldu.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(service $service)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(service $service)
    {
        return view("service.edit");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        if ($request->value !== null) {
            $updatedService = service::find($request->id);
            $updatedService->feature = $request->value;
            $updatedService->save();
            return "Başarıyla Güncellendi ";
        } else {

            return "bilinmeyen bir ptoblem oluştu.";
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if (service::find($request->service) !== null) {

            service::find($request->service)->delete();

            return "başarıyla silindi ";
        } else {


            return "bilinmeyen bir ptoblem oluştu.";
        }
    }
}
