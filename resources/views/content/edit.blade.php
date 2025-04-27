<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="/contents/{{$content->id}}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="title" value="{{$content->title}}">
    <br>
    <input type="text" name="description" value="{{$content->description}}">
    <br>
    <input type="text" name="url" value="{{$content->url}}">
    <br>
    <div id="selectContainer">
        <div class="select-wrapper">
            <select name="category_id" required class="form-select">
                <option selected value="" hidden>Tanlang</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $content->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Saqlash</button>
</form>
</body>
</html>
