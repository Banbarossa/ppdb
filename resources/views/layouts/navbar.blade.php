<nav class="navbar navbar-expand navbar-light navbar-bg">
    <a class="sidebar-toggle js-sidebar-toggle">
        <i class="hamburger align-self-center"></i>
    </a>

      
    <div class="navbar-collapse collapse">
        <ul class="navbar-nav navbar-align">
            <li class="nav-item dropdown ">
                <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#"
                    data-bs-toggle="dropdown">
                    <i class="align-middle" data-feather="settings"></i>
                </a>

                <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#"
                    data-bs-toggle="dropdown">
                    <img src="{{asset('images/logo.png')}}" class="avatar img-fluid rounded me-1"
                        alt="{{ Auth::user()->name }}" /> <span class="text-dark">{{ ucfirst(Auth::user()->name) }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-end">

                    @php
                        $getPrefix = request()->route()->getPrefix();
                    @endphp

                    

                    @if ($getPrefix == 'psb')
                        <a class="dropdown-item" href="{{route('psb.user-profile.edit')}}"><i class="align-middle me-1"
                            data-feather="user"></i> Profiles</a>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button class="dropdown-item text-danger" type="submit"><i class="align-middle me-1"
                                data-feather="log-out"></i>Log Out</button>
                        </form>

                    @elseif ($getPrefix == 'admin')
                        <form action="{{ route('admin.logout') }}" method="post">
                            @csrf
                            <button class="dropdown-item text-danger" type="submit"><i class="align-middle me-1"
                                data-feather="log-out"></i>Sign Out</button>
                        </form>
                    @endif
                    

                </div>
            </li>
        </ul>
    </div>

    

    


</nav>

