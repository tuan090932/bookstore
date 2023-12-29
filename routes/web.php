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

Route::get('/', function () {
    #return view('welcome');
    return view('home');

});


// người dùng nhấn enter :http://127.0.0.1:8000/timkiem  ->
//dòng code nãy sẽ thực thi 
// thực thi hàm function và trả về "nội dùng return " cho fortend :năm ở đường link :http://127.0.0.1:8000/timkiem 
Route::get('/timkiem', function () {
    #return view('welcome');
    return "đả tìm thấy";

});

Route::get('',function (){
    // có thể code bất cứ gì trong đây ko nhất thiết phải gọi model haoacjw viuew

});

Route::get('/unicode',function(){
    return 'hello';
});