@extends('template.frontend.default')
@section('content')
<main role="main" class="main">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12 mt-5 mb-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-light" style="padding: 20px;">
                        <li class="breadcrumb-item"><a href="{{route('homepage')}}" 
                            class="text-decoration-none">{{config('app.name')}}</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Budaya berdasarkan Provinsi
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-12">
                <div class="table-responsive mb-5">
                    <table class="table table-hover table-bordered mb-5" id="sampleTable">
                      <thead class="table-dark">
                        <tr>
                          <th width="10%">No.</th>
                          <th>Nama Provinsi</th>
                        </tr>
                      </thead>
                      <tbody>
                          @php
                              $no = 0;
                          @endphp
                        @foreach ($provinces as $province)
                        @php
                            $no++;
                        @endphp
                            <tr>
                              <td>{{$no}}</td>
                              <td><a href="{{route('getBudayaProvince', $province)}}" class="text-decoration-none">
                                {{$province->name}}</a></td>
                            </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
            </div>
        </div>
    </div>
</main>
@endsection
