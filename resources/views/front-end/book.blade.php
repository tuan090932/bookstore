@extends('front-end.layouts.header')

@section('content')

<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h2>{{$Book_current->book_name}}</h2>
        </div>
        <div class="card-body">
            <h5 class="card-title">Mô tả:</h5>
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

@endsection
