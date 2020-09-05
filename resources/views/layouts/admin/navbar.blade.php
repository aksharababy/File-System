<header class="navbar navbar-expand-sm main-header navbar-light bg-light">
    <a class="navbar-brand" href="#">{{ config('app.name') }}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @if(Auth::check())
                    {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                    @endif
                </a>
                <div class="dropdown-menu dropdown-menu--user text-center" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Profile</a>
                    <a class="dropdown-item" href="#">Settings</a>
                </div>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.logout') }}" class="nav-link"
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                    Logout
                </a>

                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
        </ul>
    </div>
</header>