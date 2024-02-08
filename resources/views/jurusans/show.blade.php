@extends('layouts.main')
@section('judul', 'Detail Jurusan')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Detail Jurusan</h1>
                    </div>
                    <div class="col text-right">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('jurusans.index') }}">Data Jurusan</a></li>
                            <li class="breadcrumb-item active">Detail</li>
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
                    <h3 class="card-title">Detail Jurusan</h3>
                </div>

                <div class="card-body">
                    <dl class="row">
                        <dt class="col-sm-3">Jurusan:</dt>
                        <dd class="col-sm-9">{{ $jurusan->nama_jurusan }}</dd>
                    </dl>

                    {{-- You can add more details here based on your model fields --}}
                </div>
            </div>
        </section>
    </div>

@endsection
