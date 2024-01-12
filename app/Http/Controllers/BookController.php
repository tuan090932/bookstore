<?php

namespace App\Http\Controllers;

use App\Models\Company; // import model company 
use App\Models\Slide; // import model company 
use App\Models\BaseClass; // import model company 
use App\Models\Author; // import model company 
use App\Models\Category; // import model company 
use App\Models\Comment; // import model company 

use App\Models\Book; // import model company 
use Illuminate\Support\Facades\Input;

use App\Http\Controllers\Homecontroller; // <-- Make sure this line is correct
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{

  private Book $book;
  private Category $category;
  private Comment $comment;

  public function __construct(Book $book, Category $category, Comment $comment)
  {
    $this->book = $book;
    $this->category = $category;
    $this->comment = $comment;
  }

  public function show($page_number = 2, $id_book)
  {

    $Book_current = $this->book->find_1($id_book);
    $comment_current = $this->comment->find_byid($id_book);


    // $comments = $Book_current->comments;
    // dd($Book_current);        //dd($allbook);
    //  return view('front-end.home',compact('allbook'));
    // return -> 
    return view('front-end.book', compact('Book_current', 'comment_current'));
  }
}
