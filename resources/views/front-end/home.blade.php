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
<div class="row">
    @foreach ($allbook as $book)
    <div class="col-3 d-flex flex-column" style="font-weight: bold; border: 2px solid lightblue; box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.1);">
    <!-- rest of your code -->
        <p class="font-weight-bold h-75" style="width: 70%">{{$book->book_name}}</p>
        <p >id ở trong database sách {{$book->id}}</p>
   

        <div class="prices">
<span class="price old-price" style="
color: red;
    position: relative;
    top: 10px;
">   €{{$book->price}}</span>
<span class="price actual-price" style="
    position: relative;
    bottom: 25px;
">€{{$book->cover_price}}</span>
</div>


        <h5><a href="{{ url('/home/' . $page_number . '/Book/' . $book->id) }}">xem thong tin chi tiet</a></h5>

        @php
            $imagePath = str_replace('/storage/app/', 'storage/', $book->book_image);
        @endphp
        <img src="{{ asset($imagePath) }}" alt="" style="width: 200px; height: 200px;">
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