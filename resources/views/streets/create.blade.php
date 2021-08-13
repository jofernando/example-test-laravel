<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="/streets" method="post">
        @csrf
        <label for="name">Name</label><br />
        <input dusk="name" name="name" type="text" /> <br />
        <label for="number">Number</label><br />
        <input dusk="number" name="number" type="number" /> <br />
        <input dusk="submit" type="submit" value="Submit">
    </form>
</body>

</html>