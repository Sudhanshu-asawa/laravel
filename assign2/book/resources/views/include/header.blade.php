<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">BOOK STORE</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class=" ml-2 " id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                <li class="nav-item">
                    <a class="nav-link text-dark font-weight-bold" aria-current="page" href="{{route('signup')}}">SignUp</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark font-weight-bold" href="{{route('login')}}">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
