<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\company;
use App\Models\requests;
use App\Notifications\OrderCreatedNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


//  yapılacakalar 
//tabloda hem kullanıcının hem de şirketin pk olamsı gerekiyor çoka çok ilişkisi var .

class OrderController extends Controller
{

    public function __construct()
    {

        $this->middleware("auth:web")->only(["store"]);
    }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("order.index");
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
    public function store(Request $request , company $company)
    {

        if ($request->company && Auth::guard("web")->user()) {
            Order::create([

                "user_id" =>  Auth::guard("web")->user()->id,
                "company_id" => $company->id,
                "order_time" => $request->orderDate
            ]);
            company::find($company->id)->notify(new OrderCreatedNotification($request->orderDate, $company));
            return back()->with("message", "istek oluşturuldu ");
        } else {
            dd($request->company, Auth::guard("web")->user());
            return back()->with("message", "hata oluştu.");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    // public function show(Order $order)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  \App\Models\Order  $order
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit(Order $order)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  \App\Models\Order  $order
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, Order $order)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  \App\Models\Order  $order
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy(Order $order)
    // {
    //     //
    // }



    // public function date(Request $request)
    // {
    //     dd($request);
    // }
}
