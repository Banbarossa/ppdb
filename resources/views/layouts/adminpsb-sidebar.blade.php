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
                    <i class="align-middle" data-feather="user"></i> <span class="align-middle">Santri baru</span>
                </a>
            </li>
            @php
                $jenjang=\App\Models\Jenjang::all();
                
            @endphp

            <div x-data="{ open: false }">
                <li class="sidebar-item d-grid {{request()->is('admin/siswa-jenjang*') ? 'active' : ''}}">
                    <button class="sidebar-link d-flex justify-content-between border-0"  @click="open = ! open"><span class="align-middle"><i class="align-middle" data-feather="bar-chart"></i>Jenjang</span> <i class="align-middle ms-auto" data-feather="chevron-right"></i></button>
                </li>
                <div class="ps-4" x-show="open">
                    @foreach ($jenjang as $item)
                        <a class="collapse-item sidebar-link" href="/admin/siswa-jenjang/{{$item->id}}">{{$item->nama_jenjang}}</a>
                    @endforeach
                </div>
            </div>

            <li class="sidebar-header">
                kelulusan
            </li>
            <div x-data="{ open: false }">
                <li class="sidebar-item d-grid {{request()->is('admin/kelulusan*') ? 'active' : ''}}">
                    <button class="sidebar-link d-flex justify-content-between border-0"  @click="open = ! open"><span class="align-middle"><i class="align-middle" data-feather="bar-chart"></i>Kelulusan</span> <i class="align-middle ms-auto" data-feather="chevron-right"></i></button>
                </li>
                <div class="ps-4" x-show="open">
                    @foreach ($jenjang as $item)
                        <a class="collapse-item sidebar-link" href="{{route('admin.kelulusan.index',$item->id)}}">{{$item->nama_jenjang}}</a>
                        
                    @endforeach
                
                </div>
            </div>
           
            

            <li class="sidebar-header">
                Pengaturan
            </li>

            <li class="sidebar-item {{request()->is('admin/tahun*')?'active':''}}">
                <a class="sidebar-link" href="{{route('admin.tahun.index')}}">
                    <i class="align-middle" data-feather="calendar"></i> <span class="align-middle">Tahun</span>
                </a>
            </li>
            <li class="sidebar-item {{request()->is('admin/contact*')?'active':''}}">
                <a class="sidebar-link" href="{{route('admin.contact.index')}}">
                    <i class="align-middle" data-feather="phone"></i> <span class="align-middle">Contact Panitia</span>
                </a>
            </li>
            <li class="sidebar-item {{request()->is('admin/jalur-pendaftaran*')?'active':''}}">
                <a class="sidebar-link" href="{{route('admin.jalur-pendaftaran.index')}}">
                    <i class="align-middle" data-feather="git-commit"></i> <span class="align-middle">Jalur Pendaftaran</span>
                </a>
            </li>
            <li class="sidebar-item {{request()->is('admin/jenjang*')?'active':''}}">
                <a class="sidebar-link" href="{{route('admin.jenjang.index')}}">
                    <i class="align-middle" data-feather="activity"></i> <span class="align-middle">Jenjang Pendidikan</span>
                </a>
            </li>
            <li class="sidebar-item {{request()->is('admin/petunjuk')?'active':''}}">
                <a class="sidebar-link" href="{{route('admin.petunjuk')}}">
                    <i class="align-middle" data-feather="user"></i> <span class="file-text">Petunjuk Pendaftaran</span>
                </a>
            </li>
            <li class="sidebar-item {{request()->is('admin/admin-management*')?'active':''}}">
                <a class="sidebar-link" href="{{route('admin.admin-management.index')}}">
                    <i class="align-middle" data-feather="user"></i> <span class="align-middle">Kelola Admin</span>
                </a>
            </li>


        </ul>

        <div class="sidebar-cta">
            <div class="sidebar-cta-content">
                <div class="mb-3 text-sm d-flex justify-content-center">
                    <img src="{{asset('images/logo.png')}}" style="width: 50px" alt="">
                </div>
                <div class="d-grid">
                    <a href="https://pis.sch.id" target="blank" class="btn btn-primary">Visit Us</a>
                </div>
            </div>
        </div>
    </div>
</nav>