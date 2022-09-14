<nav class="navbar navbar-light bg-secondary">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ Route('index') }}">
            <h2 class="text-light">B<span class="text-warning">eat</span>y</h2>
        </a>
        <div class="d-flex">
            <a href="{{ Route('index') }}" class="btn btn-light mr-2">Home</a>
            <a href="/#aboutUS" class="btn btn-light mr-2">about us</a>
            @auth('web')
                <a href="{{ Route('dashboard') }}" class="btn btn-light mr-2">Dashboard</a>
                <a href="{{ Route('profile', Auth::user()->id) }}" class="btn btn-light mr-2">{{ Auth::user()->name }}</a>
                <a href="{{ Route('logout') }}" class="btn btn-dark">Logout</a>
            @endauth
            @auth('chef')
                <a href="{{ Route('chef.index') }}" class="btn btn-light mr-2">Dashboard</a>
                <a href="{{ Route('chef.profile') }}" class="btn btn-light mr-2">{{ Auth::guard('chef')->user()->name }}</a>
                <a href="{{ Route('chef.logout') }}" class="btn btn-dark">Logout</a>
            @endauth
            @auth('admin')
                <a href="{{ Route('admin.dashboard') }}"
                    class="btn btn-light mr-2">{{ Auth::guard('admin')->user()->name }}</a>
                <a href="{{ Route('admin.logout') }}" class="btn btn-dark">Logout</a>
            @endauth
            @guest
                @guest('chef')
                    @guest('admin')
                        <a href="{{ Route('login') }}" class="btn btn-success mr-2">User</a>
                        <a href="{{ Route('chef.login_index') }}" class="btn btn-warning mr-2">Chef</a>
                    @endguest
                @endguest
            @endguest
        </div>
    </div>
</nav>
