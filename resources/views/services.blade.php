<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <!-- If user is loggedIn -->
    @if (Auth::check())
        <h1>Your Name is: {{Auth::user()->name}}</h1>
        <br>
        <h1>Your Email is: {{Auth::user()->email}}</h1>

    @else
        <h1>You are not logged in</h1>
    @endif


</body>
</html>