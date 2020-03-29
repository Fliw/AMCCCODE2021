<aside id="sidebar-wrapper">
  <div class="sidebar-brand">
    <a href="{{ route('team.dashboard') }}">{{ config('app.name') }}</a>
  </div>
  <div class="sidebar-brand sidebar-brand-sm">
    <a href="{{ route('team.dashboard') }}">{{ strtoupper(substr(config('app.name'), 0, 2)) }}</a>
  </div>
  <ul class="sidebar-menu">
    <li class="menu-header">Dashboard</li>
    <li class="{{ request()->is('team/dashboard') ? 'active' : '' }}"><a class="nav-link" href="{{ route('team.dashboard') }}"><i class="fas fa-columns"></i> <span>Dashboard</span></a></li>
  </ul>
</aside>
