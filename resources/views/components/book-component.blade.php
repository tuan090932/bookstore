<div class="container">
    <div class="row">
        @foreach ($caTegory_type as $book)
        <div class="col-3 d-flex flex-column">
            <p class="font-weight-bold h-75">{{$book->book_name}}</p>
            <p>The .img-circle class shapes the image to a circle (not available in IE8):</p>
            <p>id ở trong database sách {{$book->id}}</p>
            <p>loại của mỗi sách là -> {{$book->category_id}}</p>
            <img src="{{ asset('storage/hinh-anh/anh-bia/_ng_m_n.jpg') }}" class="img-fluid" alt="logo" class="img-size-50 mr-3 img-circle">
        </div>
        @endforeach
    </div>
</div>