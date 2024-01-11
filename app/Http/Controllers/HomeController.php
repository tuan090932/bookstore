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

        $name_10_category = $this->show_10category();

    
        //dd($allbook);
        return view('front-end.home', compact('allbook', 'page_number','name_10_category' ));
    }




    public function show_10category(){
        $soluong = 10; // 10 name dau tien -> return name
        $name_10_category = Category::show_cetegory();//-> trả về 1 array object 
        return $name_10_category;
        //dd($name_10_category);
      //  return view('front-end.home', compact('name_10_category'));

    }

    public function show_book_category_type($page_number, $id){
        $category_type =Book::getallBookbytype($id);
       // dd($category_type);
        //Lưu ý rằng thứ tự của các tham số trong phương thức controller phải khớp
        // với thứ tự của chúng trong định nghĩa route1. Trong trường hợp của bạn, $page_number đến trước $id trong định nghĩa route, vì vậy nó cũng phải đến trước $id trong danh sách tham số của phương thức controller.
        return view('front-end.category_book', compact('category_type' ));//trả về array

    }
    
    





  

}
