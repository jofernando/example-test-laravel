<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        Name {{$street->name}} <br/>
        Number {{$street->number}} <br>
        <a href="{{route('streets.index')}}">back</a>
    </div>
</body>
</html>