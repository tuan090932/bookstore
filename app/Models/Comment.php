<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB; // <-- Add this line

class Comment extends Model
{
    public function find_byid($id_book)
    {
        $ketqua = DB::table('comments')
            ->join('users', 'comments.user_id', '=', 'users.id')
            ->join('books', 'comments.book_id', '=', 'books.id')
            ->where('comments.book_id', $id_book)
            ->get();
        return $ketqua;
    }
}
