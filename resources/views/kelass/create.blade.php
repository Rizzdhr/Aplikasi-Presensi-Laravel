@extends('layouts.main')
@section('judul', 'Create Data Kelas')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="d-flex col-sm-6 align-items-center">
                        <a href="{{ route('kelass.index') }}" class="btn btn-dark"><i class="fas fa-arrow-left nav-icon"></i>   </a>
                        <span class="ml-2"><h1>Tambah Data Kelas</h1></span>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-6 container">
                    <div class="card card-dark ">
                        <div class="card-header">
                            <h3 class="card-title">Data Kelas</h3>

                            <div class="card-tools">
                                {{-- <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button> --}}
                            </div>
                        </div>
                        <form action="{{ route('kelass.store') }}" method="POST">
                            @csrf

                            <div class="card-body">
                                <div class="form-group">
                                    <label>Tingkat Kelas</label>
                                    <select name="tingkat_kelas"
                                        class="form-control @error('tingkat_kelas') is-invalid @enderror "
                                        value="{{ old('tingkat_kelas') }}">
                                        <option selected disabled>-Pilih tingkat kelas-</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                    </select>

                                    <!-- error message untuk tingkat kelas -->
                                    @error('tingkat_kelas')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="jurusan_id">Jurusan</label>
                                    <select class="form-control @error('jurusan_id') is-invalid @enderror"
                                        name="jurusan_id">
                                        <option selected disabled>-Pilih jurusan-</option>
                                        @foreach ($jurusans as $jurusan)
                                            <option value="{{ $jurusan->id }}">
                                                {{ $jurusan->nama_jurusan }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if ($jurusans->count() <= 0)
                                        <p class="text-danger mt-1">
                                            Data jurusan kosong! <a href="{{ route('jurusans.create') }}"
                                                class="text-decoration-none">Tambah</a>
                                        </p>
                                    @endif

                                    <!-- error message untuk jurusan -->
                                    @error('jurusan_id')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="nomor_kelas">Nomor Kelas</label>
                                    <input type="number" class="form-control  @error('nomor_kelas') is-invalid @enderror"
                                        name="nomor_kelas" value="{{ old('nomor_kelas') }}"
                                        placeholder="Masukkan nomor kelas">
                                    <!-- error message untuk nomor_kelas -->
                                    @error('nomor_kelas')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="guru_id">Wali Kelas</label>
                                    <select class="form-control @error('guru_id') is-invalid @enderror" name="guru_id">
                                        <option selected disabled>-Pilih wali kelas-</option>
                                        @foreach ($gurus as $guru)
                                            <option value="{{ $guru->id }}">
                                                {{ $guru->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if ($gurus->count() <= 0)
                                        <p class="text-danger mt-1">
                                            Data guru kosong! <a href="{{ route('gurus.create') }}"
                                                class="text-decoration-none">Tambah</a>
                                        </p>
                                    @endif

                                    <!-- error message untuk jurusan -->
                                    @error('guru_id')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-md btn-success">TAMBAH</button>
                                <button type="reset" class="btn btn-md btn-secondary">RESET</button>
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




{{-- @section('content') --}}
{{-- {{-- <div class="container mt-5 mb-5"> --}}
{{-- <div class="row">
            <div class="container col-md-5">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('kelass.store') }}" method="POST">

                            @csrf

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Kelas</label>
                                <input type="text" class="form-control @error('kelas') is-invalid @enderror" name="kelas" value="{{ old('kelas') }}" placeholder="Masukkan Kelas">

                                <!-- error message untuk kelas -->
                                @error('kelas')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="">Jurusan</label>
                                <select type="text" class="form-control @error('jurusan') is-invalid @enderror" name="jurusan" value="{{ old('jurusan') }}">
                                    <option value="">-</option>
                                    <option value="RPL">RPL</option>
                                    <option value="TKJ">TKJ</option>
                                    <option value="BDP">BDP</option>
                                    <option value="OTKP">OTKP</option>
                                    <option value="MM">MM</option>
                                </select>
                                <!-- error message untuk jurusan -->
                                @error('jurusan')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Walas</label>
                                <input type="text" class="form-control @error('walas') is-invalid @enderror" name="walas" value="{{ old('walas') }}" placeholder="Masukkan Walas">
                                <!-- error message untuk walas -->
                                @error('walas')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection --}}
