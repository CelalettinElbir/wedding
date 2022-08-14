<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class company extends Model
{
    use HasFactory;
    protected $guarded = [];




    public function takeimages(){

        $data = Db::table("companyimages")->where("company_id",$this->id)->get();
        
        return  $data;
    }



    public function users(){

        return $this->belongsToMany(user::class,"favorites");
    } 


}
