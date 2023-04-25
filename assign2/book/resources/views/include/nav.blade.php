<nav class="navbar navbar-expand-lg navbar-light  bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">BOOK STORE</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item text-dark">
                    <a class="nav-link text-secondary active" aria-current="page" href="{{route('view')}}">Home</a>
                </li>
                <li class="nav-item text-dark">
                    <a class="nav-link text-secondary active" aria-current="page" href="{{route('create')}}">Create</a>
                </li>
                <li class="nav-item text-secondary">
                    <a class="nav-link" onclick="return confirm('Are you sure, You want to logout')" href="{{route('logout')}}">Logout</a>
                </li>
            </ul>
            <form method="post" action="{{route('search')}}" class="d-flex">
                @csrf
                <input class="form-control me-2"  type="search" placeholder="Search" name="search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>
