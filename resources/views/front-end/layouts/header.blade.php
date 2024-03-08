<!DOCTYPE html>
<html lang="en">

<head>
    <title>Laravel Site</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">

                <li class="nav-item active">
                    <a class="nav-link" href="">Home</a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link" href="">Tài Khoản</a>
                </li>


                <!-- Add more links here -->
            </ul>
        </div>
    </nav>

    <!-- Here is where your page content will be displayed -->
    @yield('content')
</body>

</html>