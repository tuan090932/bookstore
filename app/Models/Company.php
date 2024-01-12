<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;



class Company extends Model
{

    public static function show_company()
    {
        // tư duy model -> sẽ lấy từ database và -> đối số thường url là truyền vào
        // và sẽ trả về 1 mãng row hoặc  là 1 row của database bất kỳ
        $show_company = DB::table('companies')->take(10)->get();
        return $show_company;
    }


    public static function getAllCompanyNames()
    {
        return self::pluck('company_name')->all();
    }
}
