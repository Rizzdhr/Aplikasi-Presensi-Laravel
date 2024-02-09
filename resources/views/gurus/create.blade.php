@extends('layouts.main')
@section('judul', 'Tambah Data Guru')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Tambah Data Guru</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('gurus.index') }}">Data Guru</a></li>
                            <li class="breadcrumb-item active">Tambah</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-6 container">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Guru</h3>
                        </div>

                        <form action="{{ route('gurus.store') }}" method="POST">
                            @csrf
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="">NIP</label>
                                    <input type="text" name="nip" class="form-control @error('nip') is-invalid @enderror" value="{{ old('nip') }}" placeholder="Masukkan NIP">

                                    <!-- error message untuk nip -->
                                    @error('nip')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="">Nama</label>
                                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}" placeholder="Masukkan Nama">

                                    <!-- error message untuk nama -->
                                    @error('nama')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="">Mata Pelajaran</label>
                                    <select name="mapel_id" class="form-control @error('mapel_id') is-invalid @enderror" value="{{ old('mapel_id') }}">
                                        <option selected disabled>-Pilih mata pelajaran-</option>
                                        @foreach($mapels as $mapel)
                                        <option value="{{ $mapel->id }}">
                                            {{ $mapel->nama_mapel }}
                                        </option>
                                        @endforeach
                                    </select>

                                    <!-- error message untuk mapel -->
                                    @error('mapel_id')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror" value="{{ old('jenis_kelamin') }}">
                                        <option selected disabled>-Pilih jenis kelamin-</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>

                                    <!-- error message untuk jenis_kelamin -->
                                    @error('jenis_kelamin')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-success">Tambah</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
                        </form>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>
@endsection
