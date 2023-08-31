<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="{{route('psb.dashboard')}}">
            <span class="align-middle">PSB - PIS</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Pendaftaran
            </li>

            <li class="sidebar-item {{request()->routeIs('admin.dashboard')?'active':''}}">
                <a class="sidebar-link" href="{{route('admin.dashboard')}}">
                    <i class="align-middle" data-feather="sliders"></i> <span
                        class="align-middle">Dashboard</span>
                </a>
            </li>

            <li class="sidebar-item {{request()->is('admin/user-register*') ? 'active' : ''}}">
                <a class="sidebar-link" href="{{route('admin.user-register.index')}}">
                    <i class="align-middle" data-feather="user-plus"></i> <span class="align-middle">Pendaftaran</span>
                </a>
            </li>
            <li class="sidebar-header">
                Approved
            </li>
            <li class="sidebar-item {{request()->is('admin/siswa-baru*')?'active':''}}">
                <a class="sidebar-link" href="{{route('admin.siswa-baru.index')}}">
                    <i class="align-middle" data-feather="square"></i> <span class="align-middle">Santri baru</span>
                </a>
            </li>
            @php
                $jenjang=\App\Models\Jenjang::all();
                
            @endphp

            <div x-data="{ open: false }">
                <li class="sidebar-item d-grid {{request()->is('admin/siswa-jenjang*') ? 'active' : ''}}">
                    <button class="sidebar-link d-flex justify-content-between border-0"  @click="open = ! open"><span class="align-middle"><i class="align-middle" data-feather="square"></i> Jenjang</span> <i class="align-middle ms-auto" data-feather="chevron-right"></i></button>
                </li>
                <div class="ps-4" x-show="open">
                    @foreach ($jenjang as $item)
                        <a class="collapse-item sidebar-link" href="/admin/siswa-jenjang/{{$item->id}}">{{$item->nama_jenjang}}</a>
                    @endforeach
                </div>
            </div>
            

            <li class="sidebar-header">
                Pengaturan
            </li>

            <li class="sidebar-item {{request()->is('admin/tahun*')?'active':''}}">
                <a class="sidebar-link" href="{{route('admin.tahun.index')}}">
                    <i class="align-middle" data-feather="square"></i> <span class="align-middle">Tahun</span>
                </a>
            </li>
            <li class="sidebar-item {{request()->is('admin/jalur-pendaftaran*')?'active':''}}">
                <a class="sidebar-link" href="{{route('admin.jalur-pendaftaran.index')}}">
                    <i class="align-middle" data-feather="square"></i> <span class="align-middle">Jalur Pendaftaran</span>
                </a>
            </li>
            <li class="sidebar-item {{request()->is('admin/jenjang*')?'active':''}}">
                <a class="sidebar-link" href="{{route('admin.jenjang.index')}}">
                    <i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Jenjang Pendidikan</span>
                </a>
            </li>
            <li class="sidebar-item {{request()->is('admin/contact-wa*')?'active':''}}">
                <a class="sidebar-link" href="{{route('admin.contact-wa.index')}}">
                    <i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Contact WA</span>
                </a>
            </li>


            <li class="sidebar-header">
                dropdown
            </li>


            <div x-data="{ open: false }">
                <li class="sidebar-item d-grid">
                    <button class="sidebar-link d-flex justify-content-between border-0"  @click="open = ! open"><span>collapse</span> <i class="align-middle ms-auto" data-feather="chevron-right"></i></button>
                </li>
                <div class="ps-2" x-show="open">
                    <a class="collapse-item sidebar-link" href="utilities-color.html">Colors</a>
                    <a class="collapse-item sidebar-link" href="utilities-border.html">Borders</a>
                    <a class="collapse-item sidebar-link" href="utilities-animation.html">Animations</a>
                    <a class="collapse-item sidebar-link" href="utilities-other.html">Other</a>
                </div>
            </div>



            <li class="sidebar-header">
                Plugins & Addons
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="charts-chartjs.html">
                    <i class="align-middle" data-feather="bar-chart-2"></i> <span
                        class="align-middle">Charts</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="maps-google.html">
                    <i class="align-middle" data-feather="map"></i> <span class="align-middle">Maps</span>
                </a>
            </li>
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