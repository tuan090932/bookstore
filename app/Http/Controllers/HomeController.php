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

class HomeController extends Controller {
    public function index() {
        $topCompany=Company::getTopCompany();
        $slides=Slide::getSlidesIndex();
        foreach (BaseClass::$categories as $value) {
            $listCate=CategoryController::getAllCategoriesId($value->id);
            $booksSuggest[$value->id]=Book::getAllBookSuggestByCategoryId($listCate);
            $booksHot[$value->id]=Book::getAllBookHotByCategoryId($listCate);
            $booksNew[$value->id]=Book::getAllBookNewByCategoryId($listCate);
        }
        return BaseClass::handlingView('front-end.home',[
            'booksSuggest'      =>$booksSuggest,
            'booksHot'          =>$booksHot,
            'booksNew'          =>$booksNew,
            'slides'            =>$slides,
            'topCompany'        =>$topCompany,
        ]);
    }





    public function onepage_20book12($page_number = 0 ){
        $perpage=10;
    
        $allbook = Book::getAllBooks($perpage,$page_number);
        
        //dd($allbook);
        return view('front-end.home',compact('allbook'));
        // return -> 
    }
    





  

}
