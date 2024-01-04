<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Slide extends Model
{
    protected $table ='slides';

    public $timestamps = true;

    
    public static function getSlidesIndex()
    {
    	return Slide::where('status','=',1)->orderBy('order')->get();
    }
}
