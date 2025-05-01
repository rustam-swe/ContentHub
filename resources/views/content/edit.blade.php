@extends('home')
@section('content')
<h1>Kontentni tahrirlash</h1>
<form action="/contents/{{$content->id}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <input type="text" name="title" value="{{$content->title}}" required class="form-control" placeholder="Kontent nomi">
    </div>
    <div class="mb-3">
        <input type="text" name="description" value="{{$content->description}}" required class="form-control">
    </div>
    <div class="mb-3">
        <input type="text" name="url" value="{{$content->url}}" required class="form-control">
    </div>
    <div id="selectContainer" class="mb-3">
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
