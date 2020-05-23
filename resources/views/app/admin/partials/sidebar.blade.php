<aside id="sidebar-wrapper">
  <div class="sidebar-brand">
    <a href="{{ route('admin.dashboard') }}">{{ config('app.name') }}</a>
  </div>
  <div class="sidebar-brand sidebar-brand-sm">
    <a href="{{ route('admin.dashboard') }}">{{ strtoupper(substr(config('app.name'), 0, 2)) }}</a>
  </div>
  <ul class="sidebar-menu">
    <li class="menu-header">Manage</li>
    <li class="{{ request()->is('admin') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.dashboard') }}"><i class="fas fa-columns"></i> <span>Dashboard</span></a></li>
    <li class="{{ request()->is('admin/newsfeeds') ? 'active' : '' }}"><a href="{{ route('admin.newsfeeds.index') }}"><i class="fas fa-bullhorn"></i> <span>Berita</span></a></li>
    <li class="{{ request()->is('admin/payments') ? 'active' : '' }}"><a href="{{ route('admin.payments.index') }}"><i class="fas fa-dollar-sign"></i> <span>Pembayaran</span></a></li>
    <li class="{{ request()->is('admin/schedules') ? 'active' : '' }}"><a href="{{ route('admin.schedules.index') }}"><i class="fas fa-calendar"></i> <span>Jadwal</span></a></li>
    <li class="{{ request()->is('admin/teams') ? 'active' : '' }}"><a href="{{ route('admin.teams.index') }}"><i class="fas fa-user"></i> <span>Tim</span></a></li>
    <li class="{{ request()->is('admin/quests') ? 'active' : '' }}"><a href="{{ route('admin.quests.index') }}"><i class="fas fa-exclamation-triangle"></i> <span>Submisi</span></a></li>
    <li class="menu-header">Admin</li>
    <li class="{{ request()->is('admin/accounts') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.accounts.index') }}"><i class="fas fa-user"></i> <span>Akun</span></a></li>
    <li class="{{ request()->is('admin/configs') ? 'active' : '' }}"><a href="{{ route('admin.configs.index') }}"><i class="fas fa-cogs"></i> <span>Konfigurasi</span></a></li>
  </ul>
</aside>
