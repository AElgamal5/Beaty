<nav class="navbar navbar-light bg-secondary">
    <div class="container-fluid">
        <a class="navbar-brand" href="">
            <h2 class="text-light">B<span class="text-warning">eat</span>y</h2>
        </a>
        <div class="d-flex">
            @auth
                <a href="{{ Route('logout') }}" class="btn btn-dark">Logout</a>
            @endauth
            @guest
                <a href="{{ Route('login') }}" class="btn btn-success mr-2">User</a>
                <a href="" class="btn btn-warning mr-2">Chef</a>
            @endguest
        </div>
    </div>
</nav>
<br>
