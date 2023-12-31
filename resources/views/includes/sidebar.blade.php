<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
  <div class="sb-sidenav-menu">
    <div class="nav">
      <div class="sb-sidenav-menu-heading">Core</div>
      <a class="nav-link {{ request()->is('dashboard*') ? 'active' : '' }}" href="{{ route('dashboard') }}">
        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
        Dashboard
      </a>
      <div class="sb-sidenav-menu-heading">Management</div>
      <a class="nav-link collapsed {{ request()->is('monitoringkinerja*') ? 'active' : '' }}" href="#"
        data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false"
        aria-controls="collapseLayouts">
        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
        Data
        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
      </a>
      <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
        <nav class="sb-sidenav-menu-nested nav">
          <a class="nav-link {{ request()->is('monitoringkinerja*') ? 'active' : '' }}"
            href="{{ route('monitoringkinerja.index') }}">Monitoring Kinerja</a>
        </nav>
      </div>
      <a class="nav-link collapsed {{ request()->is('user*') ? 'active' : '' }}" href="#"
        data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
        <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
        User
        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
      </a>
      <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
        <nav class="sb-sidenav-menu-nested nav">
          <a class="nav-link {{ request()->is('user*') ? 'active' : '' }}" href="{{ route('user.index') }}">User</a>
      </div>
    </div>
  </div>
  <div class="sb-sidenav-footer">
    <div class="small">Logged in as:<div>
        {{ Auth::user()->name }}
      </div>
</nav>
