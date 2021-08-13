<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table>
        <tr>
            <th>Name</th>
            <th>Action</th>
        </tr>
        @foreach($countries as $country)
        <tr>
            <td>{{ $country->name}}</td>
            <td>
                <a href="{{route('countries.edit', $country)}}">edit</a>|
                <a href="{{route('countries.show', $country)}}">show</a>
            </td>
        </tr>
        @endforeach
    </table>
</body>

</html>