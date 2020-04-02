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
    <li class="{{ request()->is('admin/newsfeeds') ? 'active' : '' }}"><a href="{{ route('admin.newsfeeds.index') }}"><i class="fas fa-bullhorn"></i> <span>Newsfeeds</span></a></li>
    <li class="{{ request()->is('admin/payments') ? 'active' : '' }}"><a href="{{ route('admin.payments.index') }}"><i class="fas fa-dollar-sign"></i> <span>Payments</span></a></li>
    <li class="{{ request()->is('admin/schedules') ? 'active' : '' }}"><a href="{{ route('admin.schedules.index') }}"><i class="fas fa-calendar"></i> <span>Schedules</span></a></li>
    <li class="{{ request()->is('admin/quests') ? 'active' : '' }}"><a href="{{ route('admin.quests.index') }}"><i class="fas fa-exclamation-triangle"></i> <span>Quests</span></a></li>
  </ul>
</aside>
