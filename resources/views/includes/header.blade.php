<nav class="navbar navbar-light bg-secondary">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ Route('index') }}">
            <h2 class="text-light">B<span class="text-warning">eat</span>y</h2>
        </a>
        <div class="d-flex">
            <a href="{{ Route('index') }}" class="btn btn-light mr-2">Home</a>
            <a href="#" class="btn btn-light mr-2">about us</a>
            <a href="#" class="btn btn-light mr-2">Chefs</a>
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
