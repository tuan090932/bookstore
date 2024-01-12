<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Category extends Model
{

    /**
     *
     *  relationship 1-n (1 Category - n Book)
     *  
     *  
     *
     */
    public static function show_cetegory()
    {
        // tư duy model -> sẽ lấy từ database và -> đối số thường url là truyền vào
        // và sẽ trả về 1 mãng row hoặc  là 1 row của database bất kỳ
        $show_cetegory = DB::table('categories')->take(10)->get();
        return $show_cetegory;
    }
}
