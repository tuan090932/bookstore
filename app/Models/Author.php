<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Author extends Model
{
    public static function show_author()
    {
        // tư duy model -> sẽ lấy từ database và -> đối số thường url là truyền vào
        // và sẽ trả về 1 mãng row hoặc  là 1 row của database bất kỳ
        $show_author = DB::table('authors')->take(10)->get();
        return $show_author;
    }
}
