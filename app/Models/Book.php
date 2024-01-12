<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Book extends Model
{
    protected $table = 'books';

    static $limit = 12;

    public $timestamps = true;





    public static function getAllBooks($page_number)
    {
        $perpage = 10;

        $page_number = (int)$page_number;
        //vi du trang 2 -> pagenumber = 2 *10 -> 20 -> thì sẽ bắt đầu thì 20 -> 30 (limit là giới hạn hàm của data)
        $books = Book::offset($page_number * $perpage)->limit($perpage)->get(['book_name', 'book_image', 'price', 'cover_price', 'id']);
        //
        return $books;
    }
    public static function find_1($item)
    {
        //$book =Book::table('books')->where('id',1);
        //return $book;


        $book = DB::table('books')->where('id', $item)->first();
        return $book;
    }



    public static function getallBookbytype($item)
    {
        //$book =Book::table('books')->where('id',1);
        //return $book;
        //-> nếu id = id --> return về array book 

        $book = DB::table('books')->where('category_id', $item)->get();
        return $book;
    }




    public static function getAllBooks1($peritempage)
    {
        $ip = 2;

        // $users = Book::table('book_name')->paginate(15);


        // $books = Book::take($peritempage)->paginate(15)->get(['book_name', 'book_image','price','cover_price']);

    }
}
