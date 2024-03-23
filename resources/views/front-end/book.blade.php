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
    <div class="container">
        <div class="row">
            <!-- Image Column -->
            <div class="col-md-6">
                <div class="book-image mb-4">
                    <img src="{{ asset(str_replace('/storage/app/', 'storage/', $Book_current->book_image)) }}" class="img-fluid rounded shadow" alt="Book Cover">
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h2 class="mb-0">{{$Book_current->book_name}}</h2>
                    </div>
                    <div class="card-body">
                        <p class="card-text mb-4">{{$Book_current->description}}</p>
                        <div class="row">
                            <div class="col-sm-6">
                                <p class="mb-1"><strong>Nhà xuất bản:</strong> {{$Book_current->publishing_house}}</p>
                                <p class="mb-1"><strong>Số trang:</strong> {{$Book_current->number_of_pages}}</p>
                            </div>
                            <div class="col-sm-6">
                                <p class="mb-1"><strong>Giá:</strong> {{$Book_current->price}}</p>
                                <p class="mb-1"><strong>Giá bìa:</strong> {{$Book_current->cover_price}}</p>
                            </div>
                        </div>
                        <form method="POST" action="/add-to-cart" class="mt-4">
                            @csrf
                            <input type="hidden" name="book_id" value="{{ $Book_current->id }}">
                            <button type="submit" class="btn btn-primary" id="buyButton" data-book-id="{{ $Book_current->id }}">Mua</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="cartDisplay" class="position-fixed bottom-0 end-0 m-3 p-3 bg-light rounded shadow">
        <h5>Số lượng sách trong giỏ hàng: <span id="cartCount"></span></h5>
        <a href="/cart" class="btn btn-secondary">Xem giỏ hàng</a>
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