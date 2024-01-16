<!DOCTYPE html>
<html lang="en">

<head>
    <title>Laravel Site</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
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