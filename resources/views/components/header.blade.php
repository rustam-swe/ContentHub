<header class="bg-body-tertiary">
    <div class="container">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            @hasanyrole('admin|super-admin')
                            <a class="nav-link active" aria-current="page" href="/dashboard">Dashboard</a>
                            @endhasanyrole
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
