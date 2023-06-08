<!DOCTYPE html>
<html lang="en">
  <head>
    @include('template.admin.partials.head')
  </head>
  <body class="app sidebar-mini">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="index.html">Wisataya</a>
      <!-- Sidebar toggle button-->
      <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
        <!-- User Menu-->
        <li class="topnav">
          <a href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
          class="btn btn-danger btn-sm"><i class="fa fa-power-off"></i>  Sign Out</a>
        </li>

        <form action="{{route('logout')}}" method="post" id="logout-form" style="display: none">
          @csrf
        </form>
      </ul>
      
    </header>
    @include('template.admin.partials.sidebar')
    <main class="app-content">
      <div class="app-title">
        <div>
          @yield('title')
        </div>
        <ul class="app-breadcrumb breadcrumb">
          @yield('breadcrumbs')
        </ul>
      </div>
      <div class="row">
        @yield('content')
      </div>
    </main>
    
    @include('template.admin.partials.script')
  </body>
</html>