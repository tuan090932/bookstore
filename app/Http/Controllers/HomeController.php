<?php

namespace App\Http\Controllers;

use App\Models\Company; // import model compay 
use App\Models\Slide; // import model compay 
use App\Models\BaseClass; // import model compay 
use App\Models\Author; // import model compay 

use App\Models\Book; // import model compay 
use Illuminate\Support\Facades\Input;

use App\Http\Controllers\Homecontroller; // <-- Make sure this line is correct
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
   public function index(){
      
      $topCompany=Company::getTopCompany();

      $slides=Slide::getSlidesIndex();
      foreach (BaseClass::$categories as $value) {


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
   public function viewAuthor($authorId=0)
   {
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


