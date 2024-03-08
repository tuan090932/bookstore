@extends('front-end.layouts.header')

@section('content')


<style>
    .custom-margin {
        margin: 30px;
    }

    .mt-300 {
        margin-top: 30px;
        /* Custom margin */
    }
</style>

<div id="cartDisplay" class="bg-light custom-margin">
    <h5>Số lượng sách trong giỏ hàng: <span id="cartCount"></span></h5>
    <a href="/cart" class="btn btn-secondary">Xem giỏ hàng</a>
</div>


<div class="container mt-300 border">

    <div class="row">
        <!-- Image Column -->
        <div class="col-md-6">
            <img src="{{asset('storage/hinh-anh/anh-bia/_ng_m_n.jpg')}}" alt="" srcset="">



        </div>
        <!-- <button id="buyButton" class="btn btn-primary" data-book-id="{{ $Book_current->id }}">Mua</button> -->
        <div class="col-md-6">

            <div id="cartDisplay" class="position-fixed bg-light">
                <h5>Số lượng sách trong giỏ hàng: <span id="cartCount"></span></h5>
                <a href="/cart" class="btn btn-secondary">Xem giỏ hàng</a>
            </div>



            <div class="card">
                <div class="card-header">
                    <h2>{{$Book_current->book_name}}</h2>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Mô tả:</h5>
                    </h5>

                    <form method="POST" action="/add-to-cart">
                        @csrf
                        <input type="hidden" name="book_id" value="{{ $Book_current->id }}">
                        <button type="submit" class="btn btn-primary" id="buyButton" data-book-id="{{ $Book_current->id }}">Mua</button>
                    </form>

                    <p class="card-text">{{$Book_current->description}}</p>
                    <div class="container">
                        <div class="row">
                            <div class="col-3 d-flex flex-column">
                                <h5 class="card-title">Nhà xuất bản:</h5>
                                <p class="card-text">{{$Book_current->publishing_house}}</p>
                            </div>

                            <div class="col-3 d-flex flex-column">

                                <h5 class="card-title">Số trang:</h5>
                                <p class="card-text">{{$Book_current->number_of_pages}}</p>
                            </div>

                            <div class="col-3 d-flex flex-column">
                                <h5 class="card-title">Giá:</h5>
                                <p class="card-text">{{$Book_current->price}}</p>

                            </div>
                            <div class="col-3 d-flex flex-column">
                                <h5 class="card-title">Giá bìa:</h5>
                                <p class="card-text">{{$Book_current->cover_price}}</p>

                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </div>

    </div>


    <script>
        // Get the current cart from Session Storage
        var cart = JSON.parse(sessionStorage.getItem('cart')) || {};

        // Update the cart count display
        document.getElementById('cartCount').innerText = Object.values(cart).reduce((a, b) => a + b, 0);

        document.getElementById('buyButton').addEventListener('click', function() {
            // Get the current book ID
            var bookId = event.target.getAttribute('data-book-id');

            // If the book is already in the cart, increment the quantity
            if (bookId in cart) {
                cart[bookId]++;
            } else {
                // Otherwise, add the book to the cart with a quantity of 1
                cart[bookId] = 1;
            }

            // Save the updated cart back to Session Storage
            sessionStorage.setItem('cart', JSON.stringify(cart));

            // Update the cart count display
            document.getElementById('cartCount').innerText = Object.values(cart).reduce((a, b) => a + b, 0);
        });
    </script>


</div>


<div>


    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2>Bình luận</h2>
                    </div>


                    @foreach ($comment_current as $comment)

                    <h4 class="media-heading"> {{$comment->name}}
                    </h4>
                    <p>
                        {{$comment->title}}
                    </p>
                    @endforeach

                </div>
            </div>
        </div>
    </div>



</div>



@endsection