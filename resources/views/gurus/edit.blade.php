@extends('layouts.main')
@section('judul', 'Edit Data Guru')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="d-flex col-sm-6 align-items-center">
                        <a href="{{ route('gurus.index') }}" class="btn btn-dark"><i class="fas fa-arrow-left nav-icon"></i></a>
                        <span class="ml-2"><h1>Edit Data Guru</h1></span>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-6 container">
                    <div class="card card-dark">
                        <div class="card-header">
                            <h3 class="card-title">Data Guru</h3>
                        </div>

                        <form action="{{ route('gurus.update', $guru->id) }}" method="POST">
                            @csrf

                            @method('PUT')
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="">NIP</label>
                                    <input type="text" name="nip" class="form-control @error('nip') is-invalid @enderror" value="{{ old('nip', $guru->nip) }}" placeholder="Masukkan NIP">

                                    <!-- error message untuk nip -->
                                    @error('nip')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="">Nama</label>
                                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama', $guru->nama) }}" placeholder="Masukkan Nama">

                                    <!-- error message untuk nama -->
                                    @error('nama')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- <div class="form-group">
                                    <label for="">Mata Pelajaran</label>
                                    <select name="mapel_id" class="form-control @error('mapel_id') is-invalid @enderror">
                                        <option selected disabled>Pilih Mapel</option>
                                        @foreach($mapels as $mapel)
                                            <option value="{{ $mapel->id }}" {{ $guru->mapel_id == $mapel->id ? 'selected' : '' }}>
                                                {{ $mapel->nama_mapel }}
                                            </option>
                                        @endforeach
                                    </select>

                                    <!-- error message untuk mapel -->
                                    @error('mapel_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div> --}}

                                <div class="form-group">
                                    <label for="">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror">
                                        <option selected disabled>Pilih Jenis Kelamin</option>
                                        <option value="Laki-laki" {{ $guru->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                        <option value="Perempuan" {{ $guru->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                    </select>

                                    <!-- error message untuk jenis_kelamin -->
                                    @error('jenis_kelamin')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-success">Simpan</button>
                                {{-- <button type="reset" class="btn btn-secondary">Reset</button> --}}
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
