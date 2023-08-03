<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    @foreach($md as $item)
        <ul>{{$item['YourDream']}}</ul>
        <a href="{{Route('Delete', [$item['id']])}}"><ul>Delete</ul></a>
        <a href="{{Route('toRepair', [$item['id']])}}"><ul>Change</ul></a>
    @endforeach
</body>
</html>