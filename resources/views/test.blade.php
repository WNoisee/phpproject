<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{Route('test')}}" method="POST">
        @csrf
        <input type="text" name="name" id="" placeholder="Enter Your Name">
        <input type="text" name="email" id="" placeholder="Enter Your Email">
        <input type="text" name="password" id="" placeholder="Enter Your Password">
        <input type="submit">
    </form>
</body>
</html>