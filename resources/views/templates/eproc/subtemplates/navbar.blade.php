<nav class="navbar navbar-expand-lg bg-white fixed-top border-bottom">
  <div class="container">
    <a href="{{ route('index') }}"><img src="{{ asset('eproc/img/logo.png') }}" class="navbar-brand" width="60px" alt=""></a>
    <img src="{{ asset('eproc/img/ISO.png') }}" class="navbar-brand" width="170" alt="">
    <button class="navbar-toggler mx-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav align-items-center text-uppercase ms-auto">
        <li class="nav-item mx-1">
          <a class="nav-link {{ str_contains(Route::currentRouteName(), 'eproc.index') ? 'text-danger' : '' }}" aria-current="page" href="{{ route('eproc.index') }}">HOME</a>
        </li>
        <li class="nav-item mx-1">
          <a class="nav-link {{ str_contains(Route::currentRouteName(), 'eproc.pengadaan') ? 'text-danger' : '' }}" href="{{ route('eproc.pengadaan') }}">PROCUREMENT</a>
        </li>
        <li class="nav-item mx-1">
          <a class="nav-link {{ str_contains(Route::currentRouteName(), 'eproc.berita-tentang-pengadaan') ? 'text-danger' : '' }}" href="{{ route('eproc.berita-tentang-pengadaan') }}">NEWS</a>
        </li>
        <li class="nav-item mx-1">
          <a class="nav-link {{ str_contains(Route::currentRouteName(), 'eproc.kontak') ? 'text-danger' : '' }}" href="{{ route('eproc.kontak') }}">CONTACT US</a>
        </li>
        @if(Session::has('eproc'))
          <li class="nav-item dropdown">
            <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi bi-person-circle fs-3"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li><a class="dropdown-item" href="{{ route('eproc.perusahaan.dashboard') }}">DASHBOARD</a></li>
              <li><a class="dropdown-item text-danger" href="{{ route('eproc.logout') }}">LOGOUT</a></li>
            </ul>
          </li>
        @else
          <li class="nav-item mx-1">
            <a class="nav-link" href="{{ route('eproc.register') }}">REGISTER</a>
          </li>
          <li class="nav-item mx-1">
            <a class="nav-link" href="{{ route('eproc.login') }}">LOGIN</a>
          </li>
        @endif
      </ul>
    </div>
  </div>
</nav>