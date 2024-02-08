@extends('layouts.main')
@section('judul', 'Absensi')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Welcome Message -->
                {{-- <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-info">
                            <h4 class="alert-heading">Halo, <b>{{ Auth::user()->name }}!</b></h4>
                            @if (Auth::user()->roles->count() > 0)
                                <p>Anda login sebagai <b>{{ Auth::user()->email }}</b> dan peran Anda adalah
                                    <b>{{ Auth::user()->roles[0]->name }}.</b>
                                </p>
                            @else
                                <p>Informasi peran Anda tidak tersedia.</p>
                            @endif
                        </div>
                    </div>
                </div> --}}
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $kelasCount }}</h3>
                                <p>Kelas</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-school nav-icon"></i>
                            </div>
                            <a href="{{ route('kelass.index') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ $siswaCount }}</h3>
                                <p>Siswa</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-users nav-icon"></i>
                            </div>
                            <a href="{{ route('siswas.index') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{ $guruCount }}</h3>
                                <p>Guru</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-user-tie nav-icon"></i>
                            </div>
                            <a href="{{ route('gurus.index') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{ $jurusanCount }}</h3>
                                <p>Jurusan</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-graduation-cap nav-icon"></i>
                            </div>
                            <a href="{{ route('jurusans.index') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{ $mapelCount }}</h3>
                                <p>Mata Pelajaran</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-book nav-icon"></i>
                            </div>
                            <a href="{{ route('mapels.index') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                {{-- <section class="col-lg-5 connectedSortable">
                    {{-- !-- Calendar --> --}}
                    {{-- <div class="card bg-gradient-success">
                        <div class="card-header border-0">

                            <h3 class="card-title">
                                <i class="far fa-calendar-alt"></i>
                                Calendar
                            </h3>
                            <!-- tools card -->
                            <div class="card-tools">
                                <!-- button with a dropdown -->
                                <div class="btn-group">
                                    <button type="button" class="btn btn-success btn-sm dropdown-toggle"
                                        data-toggle="dropdown" data-offset="-52">
                                        <i class="fas fa-bars"></i>
                                    </button>
                                    <div class="dropdown-menu" role="menu">
                                        <a href="#" class="dropdown-item">Add new event</a>
                                        <a href="#" class="dropdown-item">Clear events</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="#" class="dropdown-item">View calendar</a>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                            <!-- /. tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body pt-0">
                            <!--The calendar -->
                            <div id="calendar" style="width: 100%"></div>
                        </div>
                    <!-- Map card -->
                    {{-- <div class="card bg-gradient-primary">
                        <div class="card-header border-0"> --}}
                            {{-- <h3 class="card-title">
                                <i class="fas fa-map-marker-alt mr-1"></i>
                                Visitors
                            </h3>
                            <!-- card tools -->
                            <div class="card-tools">
                                <button type="button" class="btn btn-primary btn-sm daterange" title="Date range">
                                    <i class="far fa-calendar-alt"></i>
                                </button>
                                <button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse"
                                    title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div> --}}
                            <!-- /.card-tools -->
                        {{-- </div> --}}
                        {{-- <div class="card-body">
                            {{-- <div id="world-map" style="height: 250px; width: 100%;"></div> --}}
                        {{-- </div> --}}
                        <!-- /.card-body-->

                            {{-- <div class="row">
                                <div class="col-4 text-center">
                                    <div id="sparkline-1"></div>
                                </div>
                                <!-- ./col -->
                                <div class="col-4 text-center">
                                    <div id="sparkline-2"></div>
                                </div>
                                <!-- ./col -->
                                <div class="col-4 text-center">
                                    <div id="sparkline-3"></div>
                                </div>
                                <!-- ./col -->
                            </div>
                            <!-- /.row -->

                    <!-- /.card -->
                </section> --}}
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

@endsection
