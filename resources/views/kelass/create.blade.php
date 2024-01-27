@extends('layouts.main')
@section('judul', 'Create Data Kelas')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Tambah Data Kelas</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Project Add</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-6 container">
                    <div class="card ">
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
                                    <select name="tingkat_kelas" class="form-control @error('tingkat_kelas') is-invalid @enderror " value="{{ old('tingkat_kelas') }}">
                                        <option selected disabled>Pilih Tingkat Kelas</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                    </select>
                                    {{-- <input type="text" class="form-control @error('tingkat_kelas') is-invalid @enderror"
                                        name="tingkat_kelas" value="{{ old('tingkat_kelas') }}"
                                        placeholder="Masukkan tingkat kelas"> --}}
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
                                        <option selected disabled>Select one</option>
                                        @foreach ($jurusans as $jurusan)
                                            <option value="{{ $jurusan->id }}">
                                                {{ $jurusan->nama_jurusan }}
                                            </option>
                                        @endforeach
                                    </select>

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
                                    <label>Walas</label>
                                    <input type="text" class="form-control @error('walas') is-invalid @enderror"
                                        name="walas" value="{{ old('walas') }}" placeholder="Masukkan Walas">
                                    <!-- error message untuk walas -->
                                    @error('walas')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-md btn-success">SIMPAN</button>
                                    <button type="reset" class="btn btn-md btn-secondary">RESET</button>
                                </div>

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
