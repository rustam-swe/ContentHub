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
            /* display: flex; */
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
                    <h3>Categories</h3>
                    <select name="category_id" required class="form-select">
                        <option selected value="" hidden>Tanlang</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div id="selectAuthors">
                <div style="display: flex; align-items: center; margin-bottom: 10px;">
                    <h3 style="margin: 0;">Authors</h3>
                    <button type="button" id="addAuthorButton" class="add-btn" style="margin-left: 10px; padding: 5px 10px; background-color: green; color: white; border: none; border-radius: 5px; cursor: pointer;">+</button>
                </div>
                <div class="select-wrapper" style="display: flex; align-items: center;">
                    <select name="author_ids[]" required class="form-select">
                        <option selected value="" hidden>Tanlang</option>
                        @foreach($authors as $author)
                            <option value="{{ $author->id }}">{{ $author->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div id="selectGenres">
                <div style="display: flex; align-items: center; margin-bottom: 10px;">
                    <h3 style="margin: 0;">Genres</h3>
                    <button type="button" id="addGenreButton" class="add-btn" style="margin-left: 10px; padding: 5px 10px; background-color: green; color: white; border: none; border-radius: 5px; cursor: pointer;">+</button>
                </div>
                <div class="select-wrapper" style="display: flex; align-items: center;">
                    <select name="genre_ids[]" required class="form-select">
                        <option selected value="" hidden>Tanlang</option>
                        @foreach($genres as $genre)
                            <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>


        </div>

        <button type="submit" class="btn btn-primary">Yaratish</button>

    </form>

</body>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Authors qo'shish
        const addAuthorButton = document.getElementById('addAuthorButton');
        const selectAuthors = document.getElementById('selectAuthors');

        addAuthorButton.addEventListener('click', function() {
            const wrapper = document.createElement('div');
            wrapper.className = 'select-wrapper';
            wrapper.style.display = 'flex';
            wrapper.style.alignItems = 'center';
            wrapper.style.marginTop = '10px';

            const originalSelect = selectAuthors.querySelector('select');
            const newSelect = originalSelect.cloneNode(true);
            newSelect.value = '';

            const removeBtn = document.createElement('button');
            removeBtn.type = 'button';
            removeBtn.innerText = '-';
            removeBtn.style.marginLeft = '10px';
            removeBtn.style.padding = '5px 10px';
            removeBtn.style.backgroundColor = 'red';
            removeBtn.style.color = 'white';
            removeBtn.style.border = 'none';
            removeBtn.style.borderRadius = '5px';
            removeBtn.style.cursor = 'pointer';

            removeBtn.addEventListener('click', function() {
                wrapper.remove();
            });

            wrapper.appendChild(newSelect);
            wrapper.appendChild(removeBtn);

            selectAuthors.appendChild(wrapper);
        });

        // Genres qo'shish
        const addGenreButton = document.getElementById('addGenreButton');
        const selectGenres = document.getElementById('selectGenres');

        addGenreButton.addEventListener('click', function() {
            const wrapper = document.createElement('div');
            wrapper.className = 'select-wrapper';
            wrapper.style.display = 'flex';
            wrapper.style.alignItems = 'center';
            wrapper.style.marginTop = '10px';

            const originalSelect = selectGenres.querySelector('select');
            const newSelect = originalSelect.cloneNode(true);
            newSelect.value = '';

            const removeBtn = document.createElement('button');
            removeBtn.type = 'button';
            removeBtn.innerText = '-';
            removeBtn.style.marginLeft = '10px';
            removeBtn.style.padding = '5px 10px';
            removeBtn.style.backgroundColor = 'red';
            removeBtn.style.color = 'white';
            removeBtn.style.border = 'none';
            removeBtn.style.borderRadius = '5px';
            removeBtn.style.cursor = 'pointer';

            removeBtn.addEventListener('click', function() {
                wrapper.remove();
            });

            wrapper.appendChild(newSelect);
            wrapper.appendChild(removeBtn);

            selectGenres.appendChild(wrapper);
        });
    });
    </script>


</html>
