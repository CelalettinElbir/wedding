<?php

namespace App\Models;

use App\Models\package;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class company extends Model
{
    use HasFactory;



    public function takePackage()
    {


        $data =  DB::table('packages')->where('company_id', $this->id)->get();

        return $data;
    }
}
