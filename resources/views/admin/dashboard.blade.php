@extends('template.admin.default')
<input type="hidden">
@section('title')
    <h1><i class="fa fa-dashboard"></i>   Administrator</h1>
    <p>Halaman Administrator Wisataya</p>
@endsection
@section('breadcrumbs')
    {{ Breadcrumbs::render('dashboard') }}
@endsection
@section('content')
    @if (auth()->user()->hasRole('administrator'))
        <div class="col-md-3">
            <div class="widget-small primary coloured-icon">
                <i class="icon fa fa-users fa-3x"></i>
                <div class="info">
                    <h4>Users</h4>
                    <p><b>{{$users->count()}}</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="widget-small info coloured-icon">
                <i class="icon fa fa-database fa-3x"></i>
                <div class="info">
                    <h4>Wisata</h4>
                    <p><b>{{$content}}</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="widget-small info coloured-icon">
                <i class="icon fa fa-database fa-3x"></i>
                <div class="info">
                    <h4>Budaya</h4>
                    <p><b>{{$contentBudaya}}</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="widget-small info coloured-icon">
                <i class="icon fa fa-database fa-3x"></i>
                <div class="info">
                    <h4>Penginapan</h4>
                    <p><b>{{$penginapan}}</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="widget-small warning coloured-icon">
                <i class="icon fa fa-upload fa-3x"></i>
                <div class="info">
                    <h4>Published</h4>
                    <p><b>{{$publish}}</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="widget-small danger coloured-icon">
                <i class="icon fa fa-archive fa-3x"></i>
                <div class="info">
                    <h4>Not Published</h4>
                    <p><b>{{$notPublish}}</b></p>
                </div>
            </div>
        </div>
        

        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Data Wisata oleh User</h3>
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <th>Nomor</th>
                                <th>Nama</th>
                                <th>Wisata</th>
                                <th>Published</th>
                                <th>Not Published</th>
                            </thead>
                            <tbody>
                                @php
                                    $no=0;
                                @endphp
                                @foreach ($users as $user)
                                @php
                                    $no++;
                                @endphp
                                    <tr>
                                        <td>{{$no}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$getCountContent->getCountContent($user->id)}}</td>
                                        <td>{{$getCountContentPublish->getCountContentPublish($user->id)}}</td>
                                        <td>{{$getCountContentNotPublish->getCountContentNotPublish($user->id)}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Data Budaya oleh User</h3>
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <th>Nomor</th>
                                <th>Nama</th>
                                <th>Budaya</th>
                                <th>Published</th>
                                <th>Not Published</th>
                            </thead>
                            <tbody>
                                @php
                                    $no=0;
                                @endphp
                                @foreach ($users as $user)
                                @php
                                    $no++;
                                @endphp
                                    <tr>
                                        <td>{{$no}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$getCountBudaya->getCountBudaya($user->id)}}</td>
                                        <td>{{$getCountBudayaPublish->getCountBudayaPublish($user->id)}}</td>
                                        <td>{{$getCountBudayaNotPublish->getCountBudayaNotPublish($user->id)}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Data Penginapan oleh User</h3>
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <th>Nomor</th>
                                <th>Nama</th>
                                <th>Penginapan</th>
                                <th>Published</th>
                                <th>Not Published</th>
                            </thead>
                            <tbody>
                                @php
                                    $no=0;
                                @endphp
                                @foreach ($users as $user)
                                @php
                                    $no++;
                                @endphp
                                    <tr>
                                        <td>{{$no}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$getCountPenginapan->getCountPenginapan($user->id)}}</td>
                                        <td>{{$getCountPenginapanPublish->getCountPenginapanPublish($user->id)}}</td>
                                        <td>{{$getCountPenginapanNotPublish->getCountPenginapanNotPublish($user->id)}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @elseif(auth()->user()->hasRole('contributor'))
        <div class="col-md-3">
            <div class="widget-small info coloured-icon">
                <i class="icon fa fa-database fa-3x"></i>
                <div class="info">
                    <h4>Wisata</h4>
                    <p><b>{{$userContent}}</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="widget-small info coloured-icon">
                <i class="icon fa fa-database fa-3x"></i>
                <div class="info">
                    <h4>Budaya</h4>
                    <p><b>{{$userBudaya}}</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="widget-small warning coloured-icon">
                <i class="icon fa fa-upload fa-3x"></i>
                <div class="info">
                    <h4>Published</h4>
                    <p><b>{{$userContContentPublish}}</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="widget-small danger coloured-icon">
                <i class="icon fa fa-archive fa-3x"></i>
                <div class="info">
                    <h4>Not Published</h4>
                    <p><b>{{$userContContentNotPublish}}</b></p>
                </div>
            </div>
        </div>    
    @elseif(auth()->user()->hasRole('innowner'))
        <div class="col-md-4">
            <div class="widget-small info coloured-icon">
                <i class="icon fa fa-database fa-3x"></i>
                <div class="info">
                    <h4>Penginapan</h4>
                    <p><b>{{$userPenginapan}}</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="widget-small warning coloured-icon">
                <i class="icon fa fa-upload fa-3x"></i>
                <div class="info">
                    <h4>Published</h4>
                    <p><b>{{$userPenginapanPublish}}</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="widget-small danger coloured-icon">
                <i class="icon fa fa-archive fa-3x"></i>
                <div class="info">
                    <h4>Not Published</h4>
                    <p><b>{{$userPenginapanNotPublish}}</b></p>
                </div>
            </div>
        </div>    
    @endif
@endsection