    <form action="/authors/{{$author->id}}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="name" value="{{$author->name}}">
        <br>
        <input type="text" name="url" value="{{$author->url}}">
        <br>
        <button type="submit" class="btn btn-primary">Saqlash</button>
    </form>
