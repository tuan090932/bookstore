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
    public static function find_1($item)
    {
        //$book =Book::table('books')->where('id',1);
        //return $book;
        $book = Book::find($item);
        return $book;

        


    }
    


    public static function getallBookbytype($item)
    {
        //$book =Book::table('books')->where('id',1);
        //return $book;
        //-> nếu id = id --> return về array book 
        $book = Book::where('category_id',$item)->get();

       // dd($book);
        return $book;

        
    }




public static function getAllBooks1($peritempage)
{
    $ip=2;

   // $users = Book::table('book_name')->paginate(15);


   // $books = Book::take($peritempage)->paginate(15)->get(['book_name', 'book_image','price','cover_price']);

    return $books;
}


    
}