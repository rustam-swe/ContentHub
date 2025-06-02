@extends('home')
@section('content')
    <h1>Yangi content qo'shish</h1>
    <form action="/contents" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <input type="text" class="form-control" name="title"  placeholder="Content's title"><br>
            <input type="text" class="form-control" name="description"  placeholder="Content's description"><br>
            <input type="text" class="form-control" name="url"  placeholder="Content's link"><br>
            <input type="file" class="form-control" name="thumbnail" placeholder="Content's thumbnail">

            <div id="selectContainer">
                <div class="select-wrapper">
                    <h3>Categories</h3>
                    <select name="category_id"  class="form-select">
                        <option selected value="" hidden>Tanlang</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div id="selectAuthors">
                <div style="display: flex; align-items: center; margin-bottom: 10px;">
                    <h3 style="margin: 0;">Authors</h3>
                    <button type="button" id="addAuthorButton" class="add-btn"
                            style="margin-left: 10px; padding: 5px 10px; background-color: green; color: white; border: none; border-radius: 5px; cursor: pointer;">
                        +
                    </button>
                </div>
                <div class="select-wrapper" style="display: flex; align-items: center;">
                    <select name="author_ids[]"  class="form-select">
                        <option selected value="" hidden>Tanlang</option>
                        @foreach ($authors as $author)
                            <option value="{{ $author->id }}">{{ $author->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div id="selectGenres">
                <div style="display: flex; align-items: center; margin-bottom: 10px;">
                    <h3 style="margin: 0;">Genres</h3>
                    <button type="button" id="addGenreButton" class="add-btn"
                            style="margin-left: 10px; padding: 5px 10px; background-color: green; color: white; border: none; border-radius: 5px; cursor: pointer;">
                        +
                    </button>
                </div>
                <div class="select-wrapper" style="display: flex; align-items: center;">
                    <select name="genre_ids[]"  class="form-select">
                        <option selected value="" hidden>Tanlang</option>
                        @foreach ($genres as $genre)
                            <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Yaratish</button>
    </form>
@endsection
