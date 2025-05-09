<header class="bg-body-tertiary">
    <div class="container">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <div class="d-flex justify-content-between collapse navbar-collapse" id="navbarNav">
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
                    <a class="btn btn-primary" href="/login">Login</a>
                </div>
            </div>
        </nav>
    </div>
</header>
