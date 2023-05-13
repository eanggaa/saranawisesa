<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <img src="{{ asset('logo-saranawisesa.png') }}" width="50px" alt="">
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <img src="{{ asset('logo-saranawisesa.png') }}" width="30px" alt="">
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Dashboard</li>
      @if(Session::has('compro'))
        @if(auth()->user()->level == 'superadmin')
          <li><a class="nav-link" href="{{ route('compro.superadmin.dashboard') }}"><i class="far fa-square"></i><span>Dashboard</span></a></li>
          <li class="menu-header">Menu</li>
          <li><a class="nav-link" href="{{ route('compro.superadmin.akun.index') }}"><i class="far fa-square"></i><span>Akun</span></a></li>
          <li><a class="nav-link" href="{{ route('compro.superadmin.profile-perusahaan.index') }}"><i class="far fa-square"></i><span>Profile Perusahaan</span></a></li>
          <li><a class="nav-link" href="{{ route('compro.superadmin.portofolio.index') }}"><i class="far fa-square"></i><span>Portofolio</span></a></li>
          <li><a class="nav-link" href="{{ route('compro.superadmin.artikel.index') }}"><i class="far fa-square"></i><span>Artikel</span></a></li>
          <li><a class="nav-link" href="{{ route('compro.superadmin.direksi.index') }}"><i class="far fa-square"></i><span>Direksi</span></a></li>
          <li><a class="nav-link" href="{{ route('compro.superadmin.komisaris.index') }}"><i class="far fa-square"></i><span>Komisaris</span></a></li>
          <li><a class="nav-link" href="{{ route('compro.superadmin.survey.index') }}"><i class="far fa-square"></i><span>Survey</span></a></li>
          <li><a class="nav-link" href="{{ route('compro.superadmin.setting.index') }}"><i class="far fa-square"></i><span>Setting</span></a></li>
        @endif
        @if(auth()->user()->level == 'admin')
          <li><a class="nav-link" href="{{ route('compro.admin.dashboard') }}"><i class="far fa-square"></i><span>Dashboard</span></a></li>
          <li class="menu-header">Menu</li>
          <li><a class="nav-link" href="{{ route('compro.admin.profile-perusahaan.index') }}"><i class="far fa-square"></i><span>Profile Perusahaan</span></a></li>
          <li><a class="nav-link" href="{{ route('compro.admin.portofolio.index') }}"><i class="far fa-square"></i><span>Portofolio</span></a></li>
          <li><a class="nav-link" href="{{ route('compro.admin.artikel.index') }}"><i class="far fa-square"></i><span>Artikel</span></a></li>
          <li><a class="nav-link" href="{{ route('compro.admin.direksi.index') }}"><i class="far fa-square"></i><span>Direksi</span></a></li>
          <li><a class="nav-link" href="{{ route('compro.admin.komisaris.index') }}"><i class="far fa-square"></i><span>Komisaris</span></a></li>
          <li><a class="nav-link" href="{{ route('compro.admin.survey.index') }}"><i class="far fa-square"></i><span>Survey</span></a></li>
          <li><a class="nav-link" href="{{ route('compro.admin.setting.index') }}"><i class="far fa-square"></i><span>Setting</span></a></li>
        @endif
        @if(auth()->user()->level == 'creator')
          <li><a class="nav-link" href="{{ route('compro.creator.dashboard') }}"><i class="far fa-square"></i><span>Dashboard</span></a></li>
          <li class="menu-header">Menu</li>
          <li><a class="nav-link" href="{{ route('compro.creator.artikel.index') }}"><i class="far fa-square"></i><span>Artikel</span></a></li>
        @endif
        @if(auth()->user()->level == 'helpdesk')
          <li><a class="nav-link" href="{{ route('compro.helpdesk.dashboard') }}"><i class="far fa-square"></i><span>Dashboard</span></a></li>
          <li class="menu-header">Menu</li>
          <li><a class="nav-link" href="{{ route('compro.helpdesk.survey.index') }}"><i class="far fa-square"></i><span>Survey</span></a></li>
        @endif
      @endif
      @if(Session::has('eproc'))
        @if(auth()->user()->level == 'superadmin')
          <li><a class="nav-link" href="{{ route('eproc.superadmin.dashboard') }}"><i class="far fa-square"></i><span>Dashboard</span></a></li>
          <li class="menu-header">Menu</li>
          <li class="dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="far fa-square"></i><span>Akun</span></a>
            <ul class="dropdown-menu" style="display: block;">
              <li><a class="nav-link" href="{{ route('eproc.superadmin.akun.index') }}"><span>Admin</span></a></li>
              <li><a class="nav-link" href="{{ route('eproc.superadmin.akun.index') }}"><span>Perusahaan</span></a></li>
            </ul>
          </li>
          <li><a class="nav-link" href="{{ route('eproc.superadmin.berita.index') }}"><i class="far fa-square"></i><span>Berita</span></a></li>
          <li class="dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="far fa-square"></i><span>Man Pengadaan</span></a>
            <ul class="dropdown-menu" style="display: block;">
              <li><a class="nav-link" href="{{ route('eproc.superadmin.jenis-pengadaan.index') }}">Jenis Pengadaan</a></li>
              <li><a class="nav-link" href="{{ route('eproc.superadmin.lelang.index') }}">Lelang</a></li>
              <li><a class="nav-link" href="{{ route('eproc.superadmin.penunjukan-langsung.index') }}">Penunjukan Langsung</a></li>
            </ul>
          </li>
        @endif
        @if(auth()->user()->level == 'admin')
          <li><a class="nav-link" href="{{ route('eproc.admin.dashboard') }}"><i class="far fa-square"></i><span>Dashboard</span></a></li>
          <li class="menu-header">Menu</li>
          <li><a class="nav-link" href="{{ route('eproc.admin.berita.index') }}"><i class="far fa-square"></i><span>Berita</span></a></li>
          <li class="dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="far fa-square"></i><span>Man Pengadaan</span></a>
            <ul class="dropdown-menu" style="display: block;">
              <li><a class="nav-link" href="{{ route('eproc.admin.jenis-pengadaan.index') }}">Jenis Pengadaan</a></li>
              <li><a class="nav-link" href="{{ route('eproc.admin.lelang.index') }}">Lelang</a></li>
              <li><a class="nav-link" href="{{ route('eproc.admin.penunjukan-langsung.index') }}">Penunjukan Langsung</a></li>
            </ul>
          </li>
        @endif
      @endif
    </ul>
  </aside>
</div>