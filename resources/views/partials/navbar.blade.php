<nav class="navbar bg-light navbar-expand-lg sticky-top">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="../img/k-removebg-preview.png" alt="Logo" width="30" height="28" class="d-inline-block align-text-top logo">
            KiDDO
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse nav-bar" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('products*') ? 'active' : '' }}" href="/products">Product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/posts">About</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto fs-5 d-flex">
                <li class="nav-item">
                    <a href="/favorite" class="link-secondary nav-link"><i class="bi bi-heart favorite"></i></a>
                </li>
                <li class="nav-item">
                    <a href="" class="link-secondary nav-link"><i class="bi bi-bag cart"></i></a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Welcome back, {{ auth()->user()->username }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-person ms-0" style="font-size: 18px"></i> My Profile</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="/logout" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right ms-1"></i> Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="/login" class="btn ms-auto p-1 border-1 px-2 btn-outline-secondary btn-login">
                            <i class="bi bi-box-arrow-in-right pe-2"></i>Login
                        </a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
