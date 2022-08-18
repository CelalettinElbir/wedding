<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class company extends Model
{
    use HasFactory;
    protected $guarded = [];



    public function scopeFilter($query, array $filters = null)
    {
        //filtering by price
        if (($filters["min_price"] ?? false) && ($filters["max_price"] ?? false)) {
            $query->whereBetween('price', [$filters["min_price"], $filters["max_price"]]);
        }

        //filtering by capasity

        if (($filters["max_capasity"] ?? false) && ($filters["min_capasity"] ?? false)) {
            $query->whereBetween('capasity', [$filters["min_capasity"], $filters["max_capasity"]]);
        }
    }


    public function takeimages()
    {

        $data = Db::table("companyimages")->where("company_id", $this->id)->get();

        return  $data;
    }
    public function takeServices()
    {

        $data = Db::table("services")->where("company_id", $this->id)->get();

        return  $data;
    }



    public function users()
    {

        return $this->belongsToMany(user::class, "favorites");
    }
}
