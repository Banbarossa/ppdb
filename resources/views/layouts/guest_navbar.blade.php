<section id="navbar" class="sticky-top">
    <nav class="navbar navbar-expand-lg bg-body-tertiary shadow-md">
        <div class="container py-2">
            <a href="/"
                class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                <img src="{{ asset('images/logo.png') }}" alt=""
                    style="width: 35px;height:35px">
                <span class="fs-4 fw-bold ms-3 text-maroon">Pesantren Imam Syafi'i</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto gap-3">
                    <li class="nav-item">
                        <a class="nav-link {{request()->is('/psb')?'active':''}}" aria-current="page" href="/psb">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{request()->routeIs('psb.login')?'active':''}}" href="{{route('psb.login')}}">Login</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="{{route('register')}}">register</a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link" href="">Admin</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</section>