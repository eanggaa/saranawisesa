<nav class="navbar navbar-expand-lg main-navbar">
  <form class="form-inline mr-auto">
    <ul class="navbar-nav mr-3">
      <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
      <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
    </ul>
    <div class="search-element">
      <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">
      <button class="btn" type="submit"><i class="fas fa-search"></i></button>
      <div class="search-backdrop"></div>
      <div class="search-result">
        <div class="search-header">
          Histories
        </div>
        <div class="search-item">
          <a href="#">How to hack NASA using CSS</a>
          <a href="#" class="search-close"><i class="fas fa-times"></i></a>
        </div>
        <div class="search-item">
          <a href="#">Kodinger.com</a>
          <a href="#" class="search-close"><i class="fas fa-times"></i></a>
        </div>
        <div class="search-item">
          <a href="#">#Stisla</a>
          <a href="#" class="search-close"><i class="fas fa-times"></i></a>
        </div>
      </div>
    </div>
  </form>
  <ul class="navbar-nav navbar-right">
    <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message-toggle"><i class="far fa-envelope"></i></a>
      <div class="dropdown-menu dropdown-list dropdown-menu-right">
        <div class="dropdown-header">Messages
          <div class="float-right">
            <a href="#">Mark All As Read</a>
          </div>
        </div>
        <div class="dropdown-list-content dropdown-list-message">
          <a href="#" class="dropdown-item dropdown-item-unread">
            <div class="dropdown-item-avatar">
              <img alt="image" src="{{ asset('assets/img/avatar/avatar-3.png') }}" class="rounded-circle">
              <div class="is-online"></div>
            </div>
            <div class="dropdown-item-desc">
              <b>Agung Ardiansyah</b>
              <p>Sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
              <div class="time">12 Hours Ago</div>
            </div>
          </a>
          <a href="#" class="dropdown-item">
            <div class="dropdown-item-avatar">
              <img alt="image" src="{{ asset('assets/img/avatar/avatar-4.png') }}" class="rounded-circle">
            </div>
            <div class="dropdown-item-desc">
              <b>Ardian Rahardiansyah</b>
              <p>Duis aute irure dolor in reprehenderit in voluptate velit ess</p>
              <div class="time">16 Hours Ago</div>
            </div>
          </a>
          <a href="#" class="dropdown-item">
            <div class="dropdown-item-avatar">
              <img alt="image" src="{{ asset('assets/img/avatar/avatar-5.png') }}" class="rounded-circle">
            </div>
            <div class="dropdown-item-desc">
              <b>Alfa Zulkarnain</b>
              <p>Exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
              <div class="time">Yesterday</div>
            </div>
          </a>
        </div>
        <div class="dropdown-footer text-center">
          <a href="#">View All <i class="fas fa-chevron-right"></i></a>
        </div>
      </div>
    </li>
    <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg"><i class="far fa-bell"></i></a>
      <div class="dropdown-menu dropdown-list dropdown-menu-right">
        <div class="dropdown-header">Notifications
          <div class="float-right">
            <a href="#">Mark All As Read</a>
          </div>
        </div>
        <div class="dropdown-list-content dropdown-list-icons">
          <a href="#" class="dropdown-item">
            <div class="dropdown-item-icon bg-info text-white">
              <i class="far fa-user"></i>
            </div>
            <div class="dropdown-item-desc">
              <b>You</b> and <b>Dedik Sugiharto</b> are now friends
              <div class="time">10 Hours Ago</div>
            </div>
          </a>
          <a href="#" class="dropdown-item">
            <div class="dropdown-item-icon bg-success text-white">
              <i class="fas fa-check"></i>
            </div>
            <div class="dropdown-item-desc">
              <b>Kusnaedi</b> has moved task <b>Fix bug header</b> to <b>Done</b>
              <div class="time">12 Hours Ago</div>
            </div>
          </a>
        </div>
        <div class="dropdown-footer text-center">
          <a href="#">View All <i class="fas fa-chevron-right"></i></a>
        </div>
      </div>
    </li>
    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
      <div class="d-sm-none d-lg-inline-block">{{ auth()->user()->email }}</div></a>
      <div class="dropdown-menu dropdown-menu-right">
        @if(Session::has('compro'))
          @if(auth()->user()->level == 'superadmin')
            <a href="{{ route('compro.superadmin.profile') }}" class="dropdown-item has-icon">
          @endif
          @if(auth()->user()->level == 'admin')
            <a href="{{ route('compro.admin.profile') }}" class="dropdown-item has-icon">
          @endif
          @if(auth()->user()->level == 'creator')
            <a href="{{ route('compro.creator.profile') }}" class="dropdown-item has-icon">
          @endif
          @if(auth()->user()->level == 'helpdesk')
            <a href="{{ route('compro.helpdesk.profile') }}" class="dropdown-item has-icon">
          @endif
            PROFILE
          </a>
          <a href="{{ route('compro.logout') }}" class="dropdown-item has-icon text-danger">
            LOGOUT
          </a>
        @endif
        @if(Session::has('eproc'))
          @if(auth()->user()->level == 'superadmin')
            <a href="{{ route('eproc.superadmin.profile') }}" class="dropdown-item has-icon">
              PROFILE
            </a>
          @endif
          @if(auth()->user()->level == 'admin')
            <a href="{{ route('eproc.admin.profile') }}" class="dropdown-item has-icon">
              PROFILE
            </a>
          @endif
          @if(auth()->user()->level == 'perusahaan')
            <a href="{{ route('eproc.perusahaan.profile') }}" class="dropdown-item has-icon">
              PROFILE
            </a>
            <a href="{{ route('eproc.pengadaan') }}" class="dropdown-item has-icon">
              PENGADAAN
            </a>
          @endif
          <a href="{{ route('eproc.logout') }}" class="dropdown-item has-icon text-danger">
            LOGOUT
          </a>
        @endif
      </div>
    </li>
  </ul>
</nav>