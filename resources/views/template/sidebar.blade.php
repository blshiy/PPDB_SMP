            <div class="sidebar-wrapper active">
                <div class="sidebar-header position-relative">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="logo">
                            <a href="{{route('dashboard')}}">
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

                        <li class="sidebar-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                            <a href="{{route('dashboard')}}" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item {{ request()->routeIs('admin.data','pendaftar.detail') ? 'active' : '' }}">
                            <a href="{{route('admin.data')}}" class='sidebar-link'>
                                <i class="bi bi-file-earmark-check-fill"></i>
                                <span>Verifikasi Data</span>
                            </a>
                        </li>

                        <li class="sidebar-item {{ request()->routeIs('admin.ekspor') ? 'active' : '' }}">
                            <a href="{{route('admin.ekspor')}}" class='sidebar-link'>
                               <i class="bi bi-clipboard-data"></i>
                                <span>Eksport Data</span>
                            </a>
                        </li>

                        <li class="sidebar-item {{ request()->routeIs('admin.informasi') ? 'active' : '' }}">
                            <a href="{{route('admin.informasi')}}" class='sidebar-link'>
                               <i class="bi bi-card-checklist"></i>
                                <span>Informasi PPDB</span>
                            </a>
                        </li>

                        {{-- <li class="sidebar-item {{ request()->routeIs('data.admin') ? 'active' : '' }}">
                            <a href="{{route('data.admin')}}" class='sidebar-link'>
                               <i class="bi bi-person-badge"></i>
                                <span>Data Pengelola</span>
                            </a>
                        </li> --}}

                         <li class="sidebar-item {{ request()->routeIs('admin.profil') ? 'active' : '' }}">
                            <a href="{{route('admin.profil')}}" class='sidebar-link'>
                              <i class="bi bi-person-circle"></i>
                                <span>Pengaturan Profil</span>
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
