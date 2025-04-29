@extends('home')
@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Kontentlar ro'yxati</h1>
        <a href="/contents/create" class="btn btn-primary">Yangi kontent qo'shish</a>
    </div>
    <div class="row">
        @foreach ($contents as $content)
        <div class="col-4 mb-3 mb-sm-0">
            <div class="card my-3">
                <div class="card-body">
                    <h5 class="card-title">{{$content->title}}</h5>
                    <p class="card-text">{{$content->description}}</p>
                    <a href="/contents/{{$content->id}}" class="btn btn-primary">More</a>
                </div>
            </div>
        </div>
        @endforeach
      </div>
</div>
@endsection
