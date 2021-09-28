<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Create Street</h1>
    <form action="/streets" method="post">
        @csrf
        <div>
            <label for="name">Name</label>
            <input dusk="name" name="name" type="text" class="@error('name') is-invalid @enderror" value="{{ old('name') }}" />
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="number">Number</label>
            <input dusk="number" name="number" type="number" class="@error('number') is-invalid @enderror" value="{{ old('number') }}" />
            @error('number')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <input dusk="submit" type="submit" value="Submit">
    </form>
</body>

</html>