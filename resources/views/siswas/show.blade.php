@extends('layouts.main')
@section('judul', 'Detail Siswa')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Detail Siswa</h1>
                    </div>
                    <div class="col text-right">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('siswas.index') }}">Data Siswa</a></li>
                            <li class="breadcrumb-item active">Detail Siswa</li>
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
                    <h3 class="card-title">Detail Siswa</h3>
                </div>

                <div class="card-body">
                    <dl class="row">
                        <dt class="col-sm-3">NISN:</dt>
                        <dd class="col-sm-9">{{ $siswa->nisn }}</dd>

                        <dt class="col-sm-3">Nama:</dt>
                        <dd class="col-sm-9">{{ $siswa->nama }}</dd>

                        <dt class="col-sm-3">Kelas:</dt>
                        <dd class="col-sm-9">{{ $siswa->kelas->tingkat_jurusan }}</dd>

                        {{-- Uncomment the following lines if you have a relationship to Jurusan --}}
                        {{-- <dt class="col-sm-3">Jurusan:</dt>
                        <dd class="col-sm-9">{{ $siswa->jurusan->nama_jurusan }}</dd> --}}

                        <dt class="col-sm-3">Jenis Kelamin:</dt>
                        <dd class="col-sm-9">{{ $siswa->jenis_kelamin }}</dd>
                    </dl>

                    {{-- You can add more details here based on your model fields --}}
                </div>
            </div>
        </section>
    </div>

@endsection
