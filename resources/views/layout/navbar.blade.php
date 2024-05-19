<nav class="main-header navbar navbar-expand-md navbar-dark navbar-primary">
    <div class="container">
        <a href="/">
            <h5 class="brand-text font-weight-cold">PPDB</h5>
        </a>
        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
        </button>

        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="/" class="nav-link {{ request()->is('/') ? 'active' : '' }}">Home</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('profil') }}"
                        class="nav-link {{ request()->is('profil*') ? 'active' : '' }}">Profil Sekolah</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('persyaratan') }}"
                        class="nav-link {{ request()->is('persyaratan*') ? 'active' : '' }}">Persyaratan</a>
                </li>

            </ul>

        </div>

        <!-- Right navbar links -->

        {{-- @if (auth()->user()->role_id == 3) --}}
        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
            <!-- Messages Dropdown Menu -->
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item ">
                @guest
                    <a class="nav-link" href="{{ route('login') }}">
                        <i class="far fa-user"></i> Login
                    </a>
                @endguest
            </li>

            {{-- @auth
                <li class="nav-item dropdown">
                    <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false" class="nav-link dropdown-toggle"><i class="far fa-user"></i>
                        {{ auth()->user()->name }}</a>
                    <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                        <li><a href="{{ route('siswa.ubahpassword') }}" class="dropdown-item"><i
                                    class="fas fa-lock mr-2"></i> Edit Password</a></li>
                        <li class="dropdown-divider"></li>
                        <a href="{{ route('logout') }}" class="dropdown-item"
                            onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt mr-2"></i> Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        {{-- <li><a href="{{ route('logout') }}" class="dropdown-item"><i class="fas fa-sign-out"></i> Logout</a></li> --}}
            <!-- Level two dropdown-->
            <!-- End Level two -->
            {{-- </ul>
        </li>

    @endauth --}}


        </ul>
        {{-- @endif --}}

    </div>
</nav>
