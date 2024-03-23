<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <title>Dashboard - Client area</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <header>
        <div>
            <img src="{{ asset('storage/hinh-anh/anh-bia/header.jpg') }}" class="d-block w-100" alt="Slide 1">

        </div>

        <div class="container-fluid bg-dark p-3">
            <div class="row">
                <div class="col-3 text-center">
                    <a href="" class="btn btn-primary">
                        <h9>home</h9>
                    </a>
                </div>

                <div class="col-3 text-center">
                    <a href="" class="btn btn-primary">
                        <h9>thông tin người dùng</h9>
                    </a>
                </div>

                <div class="col-2 text-center">
                    <a class="btn btn-primary" href="" role="button">
                        <h9>giỏ hàng</h9>
                    </a>
                </div>

                <div class="col-2 text-center">
                    <a class="btn btn-primary" href="" role="button">
                        <h9>Logout</h9>
                    </a>
                </div>

                <div class="col-2 text-center">
                    <a class="btn btn-primary" href="" role="button">
                        <h9>tình trạng đơn hàng</h9>
                    </a>
                </div>
            </div>
        </div>
    </header>

    <div>
        <div class="text-center">
            <h1>Hello, </h1>


        </div>
    </div>

    @yield('content')
</body>

</html>