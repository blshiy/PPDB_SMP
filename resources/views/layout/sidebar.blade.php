            <div class="sidebar-wrapper active">
                <div class="sidebar-header position-relative">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="logo">
                            <a href="{{route('siswa')}}">
                                <img src="{{asset('assets/dashboard/assets/images/logo/logo-ppdb.png')}}" alt="Logo" style="width: 100%; height: 100%;">
                            </a>
                        </div>

                        <div class="sidebar-toggler  x">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>

                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item {{ request()->routeIs('siswa') ? 'active' : '' }}">
                            <a href="{{route('siswa')}}" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item {{ request()->routeIs('siswa.daftar') ? 'active' : '' }}">
                            <a href="{{route('siswa.daftar')}}" class='sidebar-link'>
                                <i class="bi bi-life-preserver"></i>
                                <span>Tes dan Data</span>
                            </a>
                        </li>

                        <li class="sidebar-item {{ request()->routeIs('siswa.pengumuman') ? 'active' : '' }}">
                            <a href="{{route('siswa.pengumuman')}}" class='sidebar-link'>
                                <i class="bi bi-megaphone-fill"></i>
                                <span>Pengumuman</span>
                            </a>
                        </li>
                        <li class="sidebar-item">

                        </li>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="theme-toggle d-flex gap-2  align-items-center mt-2">
                                <div class="form-check form-switch fs-6">
                                    <input class="form-check-input  me-0" type="checkbox" id="toggle-dark">
                                    <label class="form-check-label"></label>
                                </div>
                            </div>
                        </div>

                    </ul>
                </div>
            </div>
