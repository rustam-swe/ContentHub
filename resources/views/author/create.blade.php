<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/authors" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Ism">
        <br>
        <input type="text" name="url" placeholder="Url">
        <br>
        <button type="submit" class="btn btn-primary">Saqlash</button>
    </form>
</body>
</html>