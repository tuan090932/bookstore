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

    public function onepage_20book(){
        $allbook = Book::getAllBooks();
        return view('home',compact('allbook'));



    }
    





    public function getallcompany()
    {
        $companyNames = Company::getAllCompanyNames();

        // Now you can pass $companyNames to your view
        return view('home', ['companyNames' => $companyNames])->renderSections()['content'];
    }



    public function viewAuthor($authorId=0) {
        $authorInfo= Author::find($authorId);
        if ($authorInfo!=null){
            $books= Book::getAllBookByAuthorId($authorId); 
            $total=Book::getTotalBookByAuthorId($authorId);   //lấy tổng số đơn hàng của user
            return BaseClass::handlingView('front-end.author',[
                'authorInfo'            =>$authorInfo,
                'books'                 =>$books,
                'pagination'            =>PaginationCustom::showPagination($total)
            ]);
        }
        else{
            $authors= Author::getAllAuthor();
            return BaseClass::handlingView('front-end.all-author',[
                'authors'               =>$authors,
            ]);
        }
    }
}
