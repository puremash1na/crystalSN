<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo" href="/"><img src="/public/images/logo.svg" alt="logo"></a>
        <a class="sidebar-brand brand-logo-mini" href="/"><img src="/public/images/logo-mini.svg" alt="logo"></a>
    </div>
    <ul class="nav">
        <li class="nav-item profile">
            <div class="profile-desc">
                <div class="profile-pic">
                    <div class="count-indicator">
                        @php GetMiniAvatar(Auth::user()->id)@endphp
                        <span class="count bg-success"></span>
                    </div>
                    <div class="profile-name">
                        <h5 class="mb-0 font-weight-normal">{{ Auth::user()->name }}</h5>
                    </div>
                </div>
            </div>
        </li>
        <li class="nav-item nav-category">
            <span class="nav-link">ОСНОВНОЕ</span>
        </li>
        <li class="nav-item menu-items @yield('page')">
            <a class="nav-link" href="{{route('home')}}">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
                <span class="menu-title">Страница</span>
            </a>
        </li>
        <li class="nav-item menu-items @yield('news')">
            <a class="nav-link" data-toggle="collapse" href="#news" aria-expanded="true" aria-controls="news">
              <span class="menu-icon">
                <i class="mdi mdi-laptop"></i>
              </span>
                <span class="menu-title">Новости</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="news">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link @yield('news1')" href="">Сообществ</a></li>
                    <li class="nav-item"><a class="nav-link @yield('news2')" href="">Друзей</a></li>
                    <li class="nav-item"><a class="nav-link @yield('news3')" href="">Группы</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item menu-items @yield('messages')">
            <a class="nav-link" href="/messages/{{Auth::user()->id}}">
              <span class="menu-icon">
                <i class="mdi mdi-playlist-play"></i>
              </span>
                <span class="menu-title">Сообщения</span>
            </a>
        </li>
        <li class="nav-item menu-items @yield('friend')">
            <a class="nav-link" href="/friends/{{Auth::user()->id}}">
              <span class="menu-icon">
                <i class="mdi mdi-table-large"></i>
              </span>
                <span class="menu-title">Друзья</span>
            </a>
        </li>
        <li class="nav-item menu-items @yield('community')">
            <a class="nav-link" href="/community">
              <span class="menu-icon">
                <i class="mdi mdi-chart-bar"></i>
              </span>
                <span class="menu-title">Сообщества</span>
            </a>
        </li>
        <li class="nav-item nav-category">
            <span class="nav-link">ДОПОЛНИТЕЛЬНОЕ</span>
        </li>
        <li class="nav-item menu-items @yield('crystal')">
            <a class="nav-link" data-toggle="collapse" href="#crystal" aria-expanded="true" aria-controls="auth">
              <span class="menu-icon">
                <i class="mdi mdi-security"></i>
              </span>
                <span class="menu-title">Crystal</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="crystal" style="">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link @yield('crystal1')" href=""> О Crystal </a></li>
                    <li class="nav-item"><a class="nav-link @yield('crystal2')" href=""> Блог разработки </a></li>
                    <li class="nav-item"><a class="nav-link @yield('crystal3')" href=""> Защита личных данных </a></li>
                    <li class="nav-item"><a class="nav-link @yield('crystal4')" href=""> Центр безопасности</a></li>
                    <li class="nav-item"><a class="nav-link @yield('crystal5')" href=""> Сообщество Crystal </a></li>
                </ul>
            </div>
        </li>
    </ul>
</nav>
