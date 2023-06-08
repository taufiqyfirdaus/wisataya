<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
  <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" 
    src="{{auth()->user()->getImage()}}" alt="User Image" alt="User Image" width="48">
    <div>
      <p class="app-sidebar__user-name">{{auth()->user()->name}}</p>
      <p class="app-sidebar__user-designation">{{str_replace(array('[',']','"'),'',auth()->user()->roles->pluck('name'))}}</p>
    </div>
  </div>
  <ul class="app-menu">
    <li><a class="app-menu__item" href="{{ route('dashboard')}}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
    @if (auth()->user()->hasRole('administrator'))
      <li><a class="app-menu__item" href="{{ route('province.index')}}"><i class="app-menu__icon fa fa-list"></i><span class="app-menu__label">Data Provinsi</span></a></li>
      <li><a class="app-menu__item" href="{{ route('content.index')}}"><i class="app-menu__icon fa fa-list"></i><span class="app-menu__label">Data Wisata</span></a></li>
      <li><a class="app-menu__item" href="{{ route('budaya.index')}}"><i class="app-menu__icon fa fa-list"></i><span class="app-menu__label">Data Budaya</span></a></li>
      <li><a class="app-menu__item" href="{{ route('penginapan.index')}}"><i class="app-menu__icon fa fa-hotel"></i><span class="app-menu__label">Data Penginapan</span></a></li>
      <li><a class="app-menu__item" href="{{ route('user.index')}}"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">User</span></a></li>
    @elseif(auth()->user()->hasRole('contributor'))
      <li><a class="app-menu__item" href="{{ route('content.index')}}"><i class="app-menu__icon fa fa-list"></i><span class="app-menu__label">Data Wisata</span></a></li>
      <li><a class="app-menu__item" href="{{ route('budaya.index')}}"><i class="app-menu__icon fa fa-list"></i><span class="app-menu__label">Data Budaya</span></a></li
    @elseif(auth()->user()->hasRole('innowner'))
      <li><a class="app-menu__item" href="{{ route('penginapan.index')}}"><i class="app-menu__icon fa fa-hotel"></i><span class="app-menu__label">Data Penginapan</span></a></li>
    @endif
  </ul>
</aside>