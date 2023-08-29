<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="{{route('psb.dashboard')}}">
            <span class="align-middle">PSB - PIS</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Biodata
            </li>

            <li class="sidebar-item {{request()->routeIs('psb.dashboard')?'active':''}}">
                <a class="sidebar-link" href="{{route('psb.dashboard')}}">
                    <i class="align-middle" data-feather="sliders"></i> <span
                        class="align-middle">Dashboard</span>
                </a>
            </li>

            <li class="sidebar-item {{request()->routeIs('psb.profile')?'active':''}}">
                <a class="sidebar-link" href="{{route('psb.profile')}}">
                    <div class="d-flex justify-content-between">
                        <div>
                            <i class="align-middle" data-feather="user"></i> <span class="align-middle">Profile Siswa</span>
                        </div>
                        @if (auth()->user()->level_pendaftaran > 1)
                            <span class="ms-auto"><i class="align-middle" data-feather="check"></i></span>
                        @endif
                    </div>
                </a>
            </li>
            <li class="sidebar-item {{request()->routeIs('psb.wali')?'active':''}}">
                <a class="sidebar-link" href="{{route('psb.wali')}}">
                    <div class="d-flex justify-content-between">
                        <div>
                            <i class="align-middle" data-feather="user"></i> <span class="align-middle">Data Orang Tua</span>
                        </div>
                        @if (auth()->user()->level_pendaftaran > 2)
                            <span class="ms-auto"><i class="align-middle" data-feather="check"></i></span>
                        @endif
                    </div>
                </a>
            </li>
            <li class="sidebar-item {{request()->routeIs('psb.sekolah')?'active':''}}">
                <a class="sidebar-link" href="{{route('psb.sekolah')}}">
                    <div class="d-flex justify-content-between">
                        <div>
                            <i class="align-middle" data-feather="book"></i> <span class="align-middle">Data Sekolah</span>
                        </div>
                        @if (auth()->user()->level_pendaftaran > 3)
                            <span class="ms-auto"><i class="align-middle" data-feather="check"></i></span>
                        @endif
                    </div>
                </a>
            </li>

            @if (auth()->user()->level_pendaftaran >=5)
                <li class="sidebar-header">
                    Pendaftaran Ulang
                </li>
                <li class="sidebar-item {{request()->routeIs('psb.daftar-ulang-data*')?'active':''}}">
                    <a class="sidebar-link" href="{{route('psb.daftar-ulang.index')}}">
                        <div class="d-flex justify-content-between">
                            <div>
                                <i class="align-middle" data-feather="book"></i> <span class="align-middle">Data Lengkap</span>
                            </div>
                            @if (auth()->user()->level_pendaftaran > 5)
                                <span class="ms-auto"><i class="align-middle" data-feather="check"></i></span>
                            @endif
                        </div>
                    </a>
                </li>
                <li class="sidebar-item {{request()->routeIs('psb.upload-berkas*')?'active':''}}">
                    <a class="sidebar-link" href="{{route('psb.upload-berkas.index')}}">
                        <div class="d-flex justify-content-between">
                            <div>
                                <i class="align-middle" data-feather="book"></i> <span class="align-middle">Upload Berkas</span>
                            </div>
                            @if (auth()->user()->level_pendaftaran > 6)
                                <span class="ms-auto"><i class="align-middle" data-feather="check"></i></span>
                            @endif
                        </div>
                    </a>
                </li>
                @if (auth()->user()->level_pendaftaran == 7)
                <li class="sidebar-item {{request()->routeIs('psb.upload-berkas')?'active':''}}">
                    <a class="sidebar-link" href="{{route('unduh')}}">
                        <div class="d-flex justify-content-between">
                            <div>
                                <i class="align-middle" data-feather="book"></i> <span class="align-middle">Unduh Formulih</span>
                            </div>
                            @if (auth()->user()->level_pendaftaran > 3)
                                <span class="ms-auto"><i class="align-middle" data-feather="check"></i></span>
                            @endif
                        </div>
                    </a>
                </li>
                @endif
            @endif
            
           

        </ul>

        <div class="sidebar-cta">
            <div class="sidebar-cta-content">
                <strong class="d-inline-block mb-2">Upgrade to Pro</strong>
                <div class="mb-3 text-sm">
                    Are you looking for more components? Check out our premium version.
                </div>
                <div class="d-grid">
                    <a href="upgrade-to-pro.html" class="btn btn-primary">Upgrade to Pro</a>
                </div>
            </div>
        </div>
    </div>
</nav>