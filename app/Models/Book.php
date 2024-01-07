<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Book extends Model
{
    protected $table ='books';

    static $limit =12;

    public $timestamps = true;



    public static function getAllBooks($perpage, $page_number)
    {
        $books = Book::offset($page_number * $perpage)->limit($perpage)->get(['book_name', 'book_image','price','cover_price','id']);
       // dd($books);
        return $books;
    }



public static function getAllBooks1($peritempage)
{
    $ip=2;

   // $users = Book::table('book_name')->paginate(15);


   // $books = Book::take($peritempage)->paginate(15)->get(['book_name', 'book_image','price','cover_price']);

    return $books;
}


    
}