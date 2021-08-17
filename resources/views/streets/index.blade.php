<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/app.css" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <table>
        <tr>
            <th>Name</th>
            <th>Number</th>
            <th>Actions</th>
        </tr>
        @foreach($streets as $street)
        <tr>
            <td>{{ $street->name}}</td>
            <td>{{ $street->number}}</td>
            <td>
                <a href="{{route('streets.edit', $street)}}">edit</a>|
                <a href="{{route('streets.show', $street)}}">show</a>
            </td>
        </tr>
        @endforeach
    </table>
    {{ $streets->links() }}
    <button type="button" class="btn btn-primary">olá</button>
    <script src="/js/app.js"></script>
</body>

</html>