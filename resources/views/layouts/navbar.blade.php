<!-- add navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="{{ route('users.home') }}">Shoppy</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active mr-3">
                <a class="nav-link" href="{{ route('users.home') }}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item mr-3">
                <a class="nav-link" href="#products">Products</a>
            </li>
            <li class="nav-item mr-3">
                <a class="nav-link" href="#cart">Cart</a>
            </li>
            <li class="nav-item mr-3">
                <a class="nav-link" href="#about">About</a>
            </li>
            <li class="nav-item mr-3">
                <a class="nav-link" href="#contact">Contact</a>
            </li>
            <li class="nav-item mr-3 d-block d-sm-none">
                <a class="nav-link" href="{{ route('user.profile') }}">Profile</a>
            </li>
            <li class="nav-item mr-3 d-block d-sm-none">
                <a class="nav-link" href="{{ url('/logout') }}">Logout</a>
            </li>
            <li class="nav-item dropdown d-none d-sm-block">
                <a class="nav-link dropdown-toggle py-1" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="{{ Auth::user()->avatar ? asset('storage/images/avatars/'.Auth::user()->avatar) : asset('images/users/user-4.jpg')}}" class="rounded-circle mx-3" width="30" height="30">
                    {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('user.profile') }}">Profile</a>
                    <form action="{{url('/logout')}}" method="post">
                        @csrf
                        <button class="dropdown-item" type="submit">Logout</button>
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>
