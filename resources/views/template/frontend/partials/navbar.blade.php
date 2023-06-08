<nav class="navbar navbar-expand-lg bg-body-dark navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{route('homepage')}}"><img src="/wisataya/public/images/Wisataya1.svg" width="100" style="margin-bottom: 3px"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('homepage')}}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('getProvince')}}">Pariwisata Indonesia</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('getProvinceBudaya')}}">Budaya</a>
          </li>
        </ul>
        <form action="{{ route('result')}}" method="get" class="form-inline my-2 my-lg-0">
            <input type="text" class="form-control mr-sm-2" style="width:70%; float:left;" placeholder="Cari.." name="search">
            <button type="submit" class="btn btn-outline-success my-2 mt-0" style="width:20%; margin-left:10px; float:left;">Cari</button>
        </form>
        {{-- <form action="{{route('logout')}}" method="post" id="logout-form">
          @csrf
          <li class="topnav">
            <a href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
            class="btn btn-danger btn-sm"><i class="fa fa-power-off"></i>  Sign Out</a>
          </li>
        </form> --}}
      </div>
    </div>
</nav>