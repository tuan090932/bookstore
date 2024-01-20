<?php

namespace App\Http\Controllers;

use App\Models\Company; // import model company 
use App\Models\Slide; // import model company 
use App\Models\BaseClass; // import model company 
use App\Models\Author; // import model company 
use App\Models\Category; // import model company 
use App\Models\CartItem; // import model company 

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
    private CartItem $cartItem;



    public function __construct(Book $book, Category $category, Author $author, Company $company, CartItem $cartItem)
    {
        $this->book = $book;
        $this->category = $category;
        $this->author = $author;
        $this->company = $company;
        $this->cartItem = $cartItem;
    }
    public function addToCart(Request $request)
    {
        // $userId = Auth::id();
        $bookId = $request->input('book_id');

        CartItem::create([
            'user_id' => 1,
            'product_id' => $bookId,
            'quantity' => 1,
        ]);

        return back()->with('success', 'Sản phẩm đã được thêm vào giỏ hàng!');
    }
    public function viewCart()
    {
        //   $userId = Auth::id(); // Lấy ID của người dùng hiện tại

        // Lấy tất cả các mục trong giỏ hàng của người dùng
        // $cartItems =  CartItem::where('user_id', $userId)->get();

        // Gửi các mục giỏ hàng đến view
        //  return view('cart', ['cartItems' => $cartItems]);
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
}
