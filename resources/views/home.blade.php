<!DOCTYPE html>
<html lang="EN">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    {{-- <script type="module" src="/build/assets/app-Cre05DWy.js"></script> --}}
    {{-- <link rel="stylesheet" href="/build/assets/app-BAkPYJUV.css"> --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Laravel</title>
</head>

<body class="bg-black text-white pt-[56px]">
    <x-header />
    <div class="container min-vh-100 my-3">
        @yield('content')
    </div>
    <x-footer />
    @stack('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous">
    </script>
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
</body>

</html>
