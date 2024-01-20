<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



// người dùng nhấn enter :http://127.0.0.1:8000/timkiem  ->
//dòng code nãy sẽ thực thi 
// thực thi hàm function và trả về "nội dùng return " cho fortend :năm ở đường link :http://127.0.0.1:8000/timkiem 
Route::get('/timkiem', function () {
    #return view('welcome');
    return "đả tìm thấy";
});
//Route::get('/home', 'App\Http\Controllers\HomeController@index');

//Route::get('/home', 'App\Http\Controllers\HomeController@getallcompany');


Route::get('/unicode', function () {
    return 'hello';
});


Route::get('/home/{page_number}', 'App\Http\Controllers\HomeController@onepage_20book12');
Route::get('/home/{page_number}/Book/{id}', 'App\Http\Controllers\BookController@show');
Route::get('home/{page_number}/category/{id}', 'App\Http\Controllers\HomeController@show_book_category_type');
Route::post('/add-to-cart', 'App\Http\Controllers\HomeController@addToCart');
