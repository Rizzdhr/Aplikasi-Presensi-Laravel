@extends('layouts.main')
@section('judul', 'Detail Mata Pelajaran')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Detail Mata Pelajaran</h1>
                    </div>
                    <div class="col text-right">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('mapels.index') }}">Data Mata Pelajaran</a></li>
                            <li class="breadcrumb-item active">Detail Mata Pelajaran</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Detail Mata Pelajaran</h3>
                </div>

                <div class="card-body">
                    <dl class="row">
                        <dt class="col-sm-3">Mata Pelajaran:</dt>
                        <dd class="col-sm-9">{{ $mapel->nama_mapel }}</dd>
                    </dl>

                    {{-- You can add more details here based on your model fields --}}
                </div>
            </div>
        </section>
    </div>

@endsection