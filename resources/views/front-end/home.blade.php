@extends('front-end.layouts.header')
@section('content')
@yield('header')
@endsection


@if (Auth::check())
<div class="card-body">
    @if (Auth::check())
    Welcome, {{ Auth::user()->name }}
    @else
    Welcome, Guest
    @endif
</div>
@endif
{{-- get fortned cook   -> dua xuong

    backend kiem tra -> authenticateioo
    roi tra ve user

    

    -}}

{{-- lấy biến name_10_category,allbook -> lên để truy xuất ,   --}}
{{--thứ 2 là nhấp vô 1 nút sách thì sẽ hiển thị thông tin sách đó
    các bước
    -> đầu tiên nhấn book ->  home/book/{{id}} -> cái id này lấy xuống được nhờ biến allbook hoặc name_10_category
->khi nhấn vào thẻ a chứ href"home/book/{{id}} route -> này sẽ gọi route home/book/{{id}} đây là lấy được rồi do href truyền lên
-> home/book/{{id}} -> trong route này mục đích là hiển thị thông tin -> truyền {{id}} vào controller để lấy sách hiện tại
-> controller nhận {{ id }} từ route gữi lên mức tìm 1 row của book id này -> gọi move_uploaded_file
-> model -> nhận vào là {{id}} và có database -> table book[id] = id -> nhã ra dùng get -> lấy được id trả về cho controller
-> rồi lúc này controller phải return view ( cái này là tên là hiểnthịsách.blade.php -> nhận 1 row của controller) -> lấy row này hiển thị các thuộc tính
--}}




<div class="container">
    <div class="row">
        <div class="col-md-4">
            <h3>Chon loai sach</h1>
        </div>
        <div class="col-md-8">
            <select class="form-select" id="categorySelect" aria-label="Select Category">
                @foreach ($name_10_category as $book_type)
                <option value="{{ url('/home/' . $page_number . '/category/' . $book_type->id) }}">
                    {{$book_type->category_name}}
                </option>
                @endforeach
            </select>
        </div>
    </div>
</div>


<script>
    document.getElementById('categorySelect').addEventListener('change', function() {
        var url = this.value;
        window.location.href = url;
    });
</script>



<div class="container">
    <div class="row">
        <div class="col-md-4">
            <h3>Chon ten Tac Gia</h3>
        </div>
        <div class="col-md-8">
            <select class="form-select" id="categorySelect" aria-label="Select Category">
                @foreach ($name_10_Author as $Author)
                <option value="{{ url('/home/' . $page_number . '/category/' . $Author->id) }}">
                    {{$Author->author_name}}
                </option>
                @endforeach
            </select>
        </div>
    </div>
</div>

<script>
    document.getElementById('categorySelect').addEventListener('change', function() {
        var url = this.value;
        window.location.href = url;
    });
</script>







<div class="container">
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap Carousel</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <style>
            /* Custom style to prevent carousel from being distorted 
   if for some reason image doesn't load */
            .carousel-item {
                min-height: 280px;
            }
        </style>
    </head>

    <body>

        <div>
            <div class="d-flex justify-content-center">
                <p><abbr title="attribute">Sach Ban Chay 2024</abbr></p>
            </div>

            <div class="container-lg my-3" style="width: 20%; height: 20%;">
                <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                    <!-- Carousel indicators -->
                    <ol class="carousel-indicators">
                        <li data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"></li>
                        <li data-bs-target="#myCarousel" data-bs-slide-to="1"></li>
                        <li data-bs-target="#myCarousel" data-bs-slide-to="2"></li>
                    </ol>

                    <!-- Wrapper for carousel items -->
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('storage/hinh-anh/anh-bia/_ng_m_n.jpg') }}" class="d-block w-100" alt="Slide 1">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('storage/hinh-anh/anh-bia/_t_ng_l_i.jpg') }}" class="d-block w-100" alt="Slide 1">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('storage/hinh-anh/anh-bia/7_ki_quan_the_gioi.jpg') }}" class="d-block w-100" alt="Slide 1">
                        </div>
                    </div>

                    <!-- Carousel controls -->
                    <a class="carousel-control-prev" href="#myCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#myCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>
                </div>
            </div>

        </div>

    </body>

    </html>



    <div class="row">

        <div class="d-flex align-items-center" style="background-color: #f9c1d2; padding: 10px;">
            <i class="fas fa-chart-line mr-3" style="color: red;"></i>
            <h4>XU HƯỚNG MUA SẮM</h1>
        </div>


        @foreach ($allbook as $book)
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-img-top d-flex justify-content-center" style="border: none; padding: 0;">
                    <img src="{{ asset(str_replace('/storage/app/', 'storage/', $book->book_image)) }}" class="img-fluid" style="width: 200px; height: 300px;" alt="Book Cover">
                </div>
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{$book->book_name}}</h5>
                    <p class="card-text mb-auto">id ở trong database sách {{$book->id}}</p>
                    <div class="prices mt-auto">
                        <span class="price old-price text-danger">€{{$book->price}}</span>
                        <span class="price actual-price">€{{$book->cover_price}}</span>
                    </div>
                    <a href="{{ url('/home/' . $page_number . '/Book/' . $book->id) }}" class="btn btn-primary mt-3">xem thong tin chi tiet</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>



<nav aria-label="Page navigation example">
    <ul class="pagination">
        <li class="page-item"><a class="page-link prev" href="" data-value="1">Previous</a></li>
        <li class="page-item"><a class="page-link" href="http://127.0.0.1:8000/home/1" value=1></a></li>
        <li class="page-item"><a class="page-link" href="http://127.0.0.1:8000/home/2" value=2></a></li>
        <li class="page-item"><a class="page-link" href="http://127.0.0.1:8000/home/3" value=3></a></li>
        <li class="page-item"><a class="page-link next" href="" data-value="1">Next</a></li>
    </ul>
</nav>




<script>
    document.addEventListener('DOMContentLoaded', function() {
        const pagination = document.querySelector('.pagination');
        const prevLink = pagination.querySelector('.prev');
        const nextLink = pagination.querySelector('.next');
        const pageLinks = pagination.querySelectorAll('.page-link:not(.prev):not(.next)');

        let currentValue = 1;

        function updatePagination() {
            pageLinks.forEach(function(link) {
                link.textContent = currentValue;
                link.setAttribute('data-value', currentValue);
                link.href = `http://127.0.0.1:8000/home/${currentValue}`;
            });

            prevLink.setAttribute('data-value', currentValue - 1);
            nextLink.setAttribute('data-value', currentValue + 1);
        }

        updatePagination();

        prevLink.addEventListener('click', function(e) {
            e.preventDefault();
            if (currentValue > 1) {
                currentValue--;
                updatePagination();
            }
        });

        nextLink.addEventListener('click', function(e) {
            e.preventDefault();
            currentValue++;
            updatePagination();
        });
    });
</script>
</div>




@extends('front-end.layouts.footer')