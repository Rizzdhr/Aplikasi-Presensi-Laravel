@extends('layouts.main')
@section('judul', 'Edit Data Kelas')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Data Kelas</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('kelass.index') }}">Data Kelas</a></li>
                                <li class="breadcrumb-item active">Edit</li>
                            </ol>
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
                            <h3 class="card-title">Data Kelas</h3>

                            {{-- <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div> --}}
                        </div>
                        <form action="{{ route('kelass.update', $Kelas->id) }}" method="POST">
                            @csrf

                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Tingkat Kelas</label>
                                    <select name="tingkat_kelas"
                                        class="form-control @error('tingkat_kelas') is-invalid @enderror">
                                        <option value="10"
                                            {{ old('tingkat_kelas', $Kelas->tingkat_kelas) == '10' ? 'selected' : '' }}>10
                                        </option>
                                        <option value="11  "
                                            {{ old('tingkat_kelas', $Kelas->tingkat_kelas) == '11' ? 'selected' : '' }}>11
                                        </option>
                                        <option value="12"
                                            {{ old('tingkat_kelas', $Kelas->tingkat_kelas) == '12' ? 'selected' : '' }}>12
                                        </option>n
                                    </select>
                                    <!-- error message for tingkat kelas -->
                                    @error('tingkat_kelas')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Jurusan</label>
                                    <select class="form-control @error('jurusan_id') is-invalid @enderror"
                                        name="jurusan_id">
                                        @foreach ($jurusans as $jurusan)
                                            <option value="{{ $jurusan->id }}"
                                                {{ old('jurusan_id', $Kelas->jurusan_id) == $jurusan->id ? 'selected' : '' }}>
                                                {{ $jurusan->nama_jurusan }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <!-- error message untuk jurusan -->
                                    @error('jurusan')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="nomor_kelas">Nomor Kelas</label>
                                    <input type="number" class="form-control  @error('nomor_kelas') is-invalid @enderror"
                                        name="nomor_kelas" value="{{ old('nomor_kelas', $Kelas->nomor_kelas) }}"
                                        placeholder="Masukkan nomor kelas">
                                    <!-- error message untuk nomor_kelas -->
                                    @error('nomor_kelas')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Wali Kelas</label>
                                    <select class="form-control @error('guru_id') is-invalid @enderror" name="guru_id">
                                        @foreach ($gurus as $guru)
                                            <option value="{{ $guru->id }}"
                                                {{ old('guru_id', $Kelas->guru_id) == $guru->id ? 'selected' : '' }}>
                                                {{ $guru->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <!-- error message untuk guru -->
                                    @error('guru')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-md btn-success">SIMPAN</button>
                                {{-- <button type="reset" class="btn btn-md btn-secondary">RESET</button> --}}
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







{{-- <body style="background: lightgray">
@section('container')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="container col-md-5">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('kelass.update', $Kelas->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Kelas</label>
                                <input type="text" class="form-control @error('kelas') is-invalid @enderror" name="kelas" value="{{ old('kelas', $Kelas->kelas) }}" >

                                <!-- error message untuk kelas -->
                                @error('kelas')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="jurusan">Jurusan</label>
                                <select class="form-control @error('jurusan') is-invalid @enderror" name="jurusan">
                                    <option value="RPL" {{ old('jurusan', $Kelas->jurusan) == 'RPL' ? 'selected' : '' }}>RPL</option>
                                    <option value="TKJ" {{ old('jurusan', $Kelas->jurusan) == 'TKJ' ? 'selected' : '' }}>TKJ</option>
                                    <option value="BDP" {{ old('jurusan', $Kelas->jurusan) == 'BDP' ? 'selected' : '' }}>BDP</option>
                                    <option value="OTKP" {{ old('jurusan', $Kelas->jurusan) == 'OTKP' ? 'selected' : '' }}>OTKP</option>
                                    <option value="MM" {{ old('jurusan', $Kelas->jurusan) == 'MM' ? 'selected' : '' }}>MM</option>
                                </select>

                            <!-- error message untuk jurusan -->
                                @error('jurusan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Walas</label>
                                <input type="text" class="form-control @error('walas') is-invalid @enderror" name="walas" value="{{ old('walas', $Kelas->walas) }}" >
                                <!-- error message untuk walas -->
                                @error('walas')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
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
