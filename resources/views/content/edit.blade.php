@extends('home')
@section('content')
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
@endsection
