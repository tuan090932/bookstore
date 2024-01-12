<?php

namespace App\Http\Controllers;

use App\Models\Company; // import model company 
use App\Models\Slide; // import model company 
use App\Models\BaseClass; // import model company 
use App\Models\Author; // import model company 
use App\Models\Category; // import model company 

use App\Models\Book; // import model company 
use Illuminate\Support\Facades\Input;

//use App\Http\Controllers\Homecontroller; // <-- Make sure this line is correct
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;


class HomeController extends Controller
{

    private Book $book;
    private Category $category;
    private Author $author;
    private Company $company;


    public function __construct(Book $book, Category $category, Author $author, Company $company)
    {
        $this->book = $book;
        $this->category = $category;
        $this->author = $author;
        $this->company = $company;
    }








    public function onepage_20book12($page_number = 0)
    {
        $allbook = $this->book->getAllBooks($page_number);
        // -> trả về 10 book -> tìm kiếm theo id_ của page -> truyền vào id page
        //lấy từ url xuống input-> url-> lấy $page_number xuống xử lý
        $name_10_category = $this->category->show_cetegory();

        $name_10_Author = $this->author->show_author();

        $name_10_Company = $this->company->show_company();



        //  $name_10_category = $this->show_10category();
        // $allbook = Book::getAllBooks($perpage, $page_number);
        //$a = $this->book->getAllBooks($perpage, $page_number);

        //dd($allbook);
        return view('front-end.home', compact('allbook', 'page_number', 'name_10_category', 'name_10_Author', 'name_10_Company'));
    }




    public function show_10category()
    {
        $soluong = 10; // 10 name dau tien -> return name
        $name_10_category = $this->category->show_cetegory();

        //   $name_10_category = Category::show_cetegory(); //-> trả về 1 array object 
        return $name_10_category;
        //dd($name_10_category);
        //  return view('front-end.home', compact('name_10_category'));

    }

    public function show_book_category_type($page_number, $id)
    {
        $category_type = $this->book->getallBookbytype($id);
        // dd($category_type);
        //Lưu ý rằng thứ tự của các tham số trong phương thức controller phải khớp
        // với thứ tự của chúng trong định nghĩa route1. Trong trường hợp của bạn, $page_number đến trước $id trong định nghĩa route, vì vậy nó cũng phải đến trước $id trong danh sách tham số của phương thức controller.
        return view('front-end.category_book', compact('category_type')); //trả về array

    }
}
