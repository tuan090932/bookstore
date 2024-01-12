@extends('front-end.layouts.header')

@section('content')

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
        @foreach ($name_10_category as $book_type)

        <div class="col-2 d-flex flex-column">
            <div class="card">
                <p><a class="link-offset-2 link-underline link-underline-opacity-0" href="{{ url('/home/' . $page_number . '/category/' . $book_type->id) }}">{{$book_type->category_name}}</a></p>
            </div>

        </div>
        @endforeach
    </div>
</div>


<div class="container">
    <div class="row">
        @foreach ($name_10_Author as $Author)

        <div class="col-2 d-flex flex-column">
            <div class="card">
                <p><a class="link-offset-2 link-underline link-underline-opacity-0" href="{{ url('/home/' . $page_number . '/category/' . $book_type->id) }}">{{$Author->author_name}}</a></p>
            </div>

        </div>
        @endforeach
    </div>
</div>


<div class="container">
    <div class="row">
        @foreach ($name_10_Company as $Company)

        <div class="col-2 d-flex flex-column">
            <div class="card">
                <p><a class="link-offset-2 link-underline link-underline-opacity-0" href="{{ url('/home/' . $page_number . '/category/' . $book_type->id) }}">{{$Company->company_name}}</a></p>
            </div>

        </div>
        @endforeach
    </div>
</div>










<div class="container">
    <div class="row">
        @foreach ($allbook as $book)
        <div class="col-3 d-flex flex-column">
            <p class="font-weight-bold h-75">{{$book->book_name}}</p>
            <p>id ở trong database sách {{$book->id}}</p>
            <h1> <a href="{{ url('/home/' . $page_number . '/Book/' . $book->id) }}"> xem thong tin chi tiet </a> </h1>
            <img src="{{ asset('storage/hinh-anh/anh-bia/_ng_m_n.jpg') }}" class="img-fluid" alt="logo" class="img-size-50 mr-3 img-circle">
        </div>
        @endforeach
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
        // Lấy tất cả các liên kết phân trang
        var pageLinks = document.querySelectorAll('.page-link');

        // Lấy tất cả các liên kết phân trang

        // Thay đổi nội dung của mỗi liên kết dựa trên giá trị của thuộc tính 'value'
        document.querySelector('.next').addEventListener('click', function(e) {
            e.preventDefault();
            var pageLinks = document.querySelectorAll('.page-link');
            pageLinks.forEach(function(pageLink) {

                var value = parseInt(pageLink.getAttribute('value'));

                pageLink.setAttribute('value', value + 1);
                pageLink.textContent = value + 1;

                console.log(value + 1)

                var href = pageLink.getAttribute('href');
                if (href.includes('home')) {
                    var newHref = href.replace(/home\/\d+/, 'home/' + (value + 1));
                    pageLink.setAttribute('href', newHref);
                }
            });





        });
    </script>





</div>



@endsection