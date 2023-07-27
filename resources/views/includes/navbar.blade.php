            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a class="{{ request()->routeIs('landing') ? 'active' : '' }}" href="{{route('landing')}}">Beranda</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->
            &nbsp;
            &nbsp;
            &nbsp;

            <a href="{{route('daftar')}}" class="btn btn-success"><i class="bi bi-person-add"></i> Daftar Sekarang</a>
            &nbsp;
                        &nbsp;
            &nbsp;
            <a href="{{route('login')}}" class="btn btn-primary"> <i class="bi bi-box-arrow-in-right"></i> Masuk</a>
