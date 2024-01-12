@extends('front-end.layouts.header')

@section('content')

<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h2>{{$Book_current->book_name}}</h2>
        </div>
        <div class="card-body">
            <h5 class="card-title">Mô tả:</h5>
            <h5>Số lượng sách mua <h5 class="card-title" id="cartCount"></h5>
            </h5>



            <button id="buyButton" class="btn btn-primary" data-book-id="{{ $Book_current->id }}">Mua</button>



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