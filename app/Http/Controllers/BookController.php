<?php

namespace App\Http\Controllers;

use App\Models\Company; // import model company 
use App\Models\Slide; // import model company 
use App\Models\BaseClass; // import model company 
use App\Models\Author; // import model company 
use App\Models\Category; // import model company 

use App\Models\Book; // import model company 
use Illuminate\Support\Facades\Input;

use App\Http\Controllers\Homecontroller; // <-- Make sure this line is correct
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    //
    public function show($page_number=2,$item){
     //   dd($item);
    
        $Book_current =Book::find_1($item);
      // dd($Book_current);        //dd($allbook);
      //  return view('front-end.home',compact('allbook'));
        // return -> 
        return view('front-end.book
        
        ', compact('Book_current'));

    }
}
