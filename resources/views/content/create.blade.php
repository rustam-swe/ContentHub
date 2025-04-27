<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Content qo'shish</title>
    <style>
        .form-control, .form-select {
            display: block;
            margin-bottom: 10px;
            width: 300px;
            padding: 8px;
        }
        .select-wrapper {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }
        .remove-btn {
            margin-left: 10px;
            padding: 5px 10px;
            background-color: red;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .remove-btn:hover {
            background-color: darkred;
        }
    </style>
</head>
<body>

    <h1>Yangi content qo'shish</h1>

    <form action="/contents" method="POST">
        @csrf
        <div class="mb-3">
            <input type="text" class="form-control" name="title" required><br>
            <input type="text" class="form-control" name="description" required><br>
            <input type="text" class="form-control" name="url" required><br>

            <div id="selectContainer">
                <div class="select-wrapper">
                    <select name="category_id" required class="form-select">
                        <option selected value="" hidden>Tanlang</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Yaratish</button>

    </form>
</body>
</html>
