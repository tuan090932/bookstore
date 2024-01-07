@extends('front-end.layouts.header')

@section('content')

<div class="container">
  <div class="row">
  @foreach ($allbook as $book)
       <div class="col-3 d-flex flex-column"> 
           <p class="font-weight-bold h-75">{{$book->book_name}}</p>
          <p>The .img-circle class shapes the image to a circle (not available in IE8):</p>     
          <p>id ở trong database sách {{$book->id}}</p>
          <img src="{{ asset('storage/hinh-anh/anh-bia/_ng_m_n.jpg') }}" class="img-fluid" alt="logo" class="img-size-50 mr-3 img-circle">
       </div>
  @endforeach
  </div>

  <nav aria-label="Page navigation example">
    <ul class="pagination">
      <li class="page-item"><a class="page-link" href="#">Previous</a></li>
      <li class="page-item"><a class="page-link" href="http://127.0.0.1:8000/home/1">1</a></li>
      <li class="page-item"><a class="page-link" href="http://127.0.0.1:8000/home/2">2</a></li>
      <li class="page-item"><a class="page-link" href="#">3</a></li>
      <li class="page-item"><a class="page-link" href="#">Next</a></li>
    </ul>
  </nav>

</div>



@endsection


