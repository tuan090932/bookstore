<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Category extends Model
{
    protected $fillable = [
        'category_name', 'parent_id', 'order'
    ];
    protected $table ='categories';
    protected $guarded =[];

    public $timestamps = false;
    
    /**
     *
     *  relationship 1-n (1 Category - n Book)
     *  
     *  
     *
     */
    public function books()
    {
        return $this->hasMany('App\Book');


    }

    public static function show_cetegory()
    {
       $show_cetegory = Category::query()->take(10)->get();
       return $show_cetegory;

        
    }
   
}