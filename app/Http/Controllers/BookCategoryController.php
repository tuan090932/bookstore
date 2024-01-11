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

class BookCategoryController extends Controller
{
    public function show($category){
        $book_category = Cetegory::find($category); // tìm kiếm theo loại -> output là tên loại đó và id của loại đó
        // muốn lấy tên ->
    }

    public function show_10category(){
        $soluong = 10; // 10 name dau tien -> return name
        $name_10_category = Category::show_cetegory();//-> trả về 1 array object 
        //dd($name_10_category);
        return view('front-end.home', compact('name_10_category'));

    }
}
