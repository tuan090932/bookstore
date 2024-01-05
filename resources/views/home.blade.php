<!DOCTYPE html>
<html>
<head>
    <title>Book Names</title>
</head>
<body>
    <h1>Book Names</h1>
    <ul>
        @foreach ($allbook as $bookName)
            <li>{{ $bookName }}</li>
        @endforeach
    </ul>
</body>
</html>
