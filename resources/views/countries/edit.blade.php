<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="{{route('countries.update', $country)}}" method="post">
        @method('put')
        @csrf
        <label for="name">Name</label><br />
        <input name="name" type="text" value="{{$country->name}}"/> <br />
        <input type="submit" value="Submit">
    </form>
</body>

</html>