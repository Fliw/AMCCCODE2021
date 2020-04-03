<aside id="sidebar-wrapper">
  <div class="sidebar-brand">
    <a href="{{ route('team.dashboard') }}">{{ config('app.name') }}</a>
  </div>
  <div class="sidebar-brand sidebar-brand-sm">
    <a href="{{ route('team.dashboard') }}">{{ strtoupper(substr(config('app.name'), 0, 2)) }}</a>
  </div>
  <ul class="sidebar-menu">
    <li class="menu-header">Dashboard</li>
    <li class="{{ request()->is('team') ? 'active' : '' }}"><a class="nav-link" href="{{ route('team.dashboard') }}"><i class="fas fa-columns"></i> <span>Dashboard</span></a></li>
    <li class="{{ request()->is('team/newsfeeds') ? 'active' : '' }}"><a href="{{ route('team.newsfeeds') }}"><i class="fas fa-bullhorn"></i> <span>Newsfeeds</span></a></li>
    <li class="{{ request()->is('team/payments') ? 'active' : '' }}"><a href="{{ route('team.payments') }}"><i class="fas fa-dollar-sign"></i> <span>Payments</span></a></li>
    <li class="{{ request()->is('team/schedules') ? 'active' : '' }}"><a href="{{ route('team.schedules') }}"><i class="fas fa-calendar"></i> <span>Schedules</span></a></li>
    <li class="{{ request()->is('team/quests') ? 'active' : '' }}"><a href="{{ route('team.quests.index') }}"><i class="fas fa-exclamation-triangle"></i> <span>Quests</span></a></li>
  </ul>
</aside>
