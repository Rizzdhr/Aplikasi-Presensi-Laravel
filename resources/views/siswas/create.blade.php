@extends('layouts.main')
@section('judul', 'Tambah Data Siswa')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="d-flex col-sm-6 align-items-center">
                        <a href="{{ route('siswas.index') }}" class="btn btn-dark"><i class="fas fa-arrow-left nav-icon"></i></a>
                        <span class="ml-2"><h1>Tambah Data Siswa</h1></span>
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
                            <h3 class="card-title">Data Siswa</h3>

                            <div class="card-tools">
                                {{-- <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button> --}}
                            </div>
                        </div>
                        <form action="{{ route('siswas.store') }}" method="POST">
                            @csrf

                            <div class="card-body">
                                <div class="form-group">
                                    <label>NISN</label>
                                    <input type="text" class="form-control @error('nisn') is-invalid @enderror"
                                        name="nisn" value="{{ old('nisn') }}" placeholder="Masukkan NISN">
                                    <!-- error message untuk nisn -->
                                    @error('nisn')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                        name="nama" value="{{ old('nama') }}" placeholder="Masukkan Nama">
                                    <!-- error message untuk nama -->
                                    @error('nama')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="kelas_id">Kelas</label>
                                    <select class="form-control  @error('kelas_id') is-invalid @enderror" id="kelas_id"
                                        name="kelas_id">
                                        <option selected disabled>-Pilih kelas-</option>
                                        @foreach ($kelass as $kelas)
                                            <option value="{{ $kelas->id }}">{{ $kelas->hasil_kelas }}</option>
                                        @endforeach
                                    </select>
                                    @if ($kelass->count() <= 0)
                                        <p class="text-danger mt-1">
                                            Data kelas kosong! <a href="{{ route('kelass.create') }}"
                                                class="text-decoration-none">Tambah</a>
                                        </p>
                                    @endif

                                    <!-- error message untuk kelas -->
                                    @error('kelas_id')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <select type="text" class="form-control @error('jenis_kelamin') is-invalid @enderror"
                                        name="jenis_kelamin" value="{{ old('jenis_kelamin') }}"
                                        placeholder="Masukkan Jenis Kelamin">
                                        <option selected disabled>-Pilih jenis kelamin-</option>
                                        <option value="Laki-laki">Laki-Laki</option>
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


                                {{-- <div class="form-group">
                                        <label for="kelas_id">Kelas</label>
                                        <select name="kelas_id" class="form-control" required>
                                            @foreach ($kelass as $kelas)
                                                <option value="{{ $kelas->id }}">
                                                    {{ $kelas->tingkat_kelas }} - {{ $kelas->jurusan->nama_jurusan }} - {{ $kelas->nomor_kelas }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div> --}}

                                {{-- <div class="form-group">
                                    <label for="jurusan_id">Jurusan</label>
                                    <select class="form-control  @error('jurusan_id') is-invalid @enderror" id="jurusan_id"
                                        name="jurusan_id">
                                        <option selected disabled>Select one</option>
                                        @foreach ($jurusans as $jurusan)
                                            <option value="{{ $jurusan->id }}">
                                                {{ $jurusan->nama_jurusan }}
                                            </option>
                                        @endforeach
                                    </select> --}}

                                {{-- <!-- error message untuk kelas -->
                                    @error('jurusan_id')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div> --}}

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










{{-- @section('content')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="container col-md-5">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('students.store') }}" method="POST">

                            @csrf

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">NISN</label>
                                <input type="text" class="form-control @error('nisn') is-invalid @enderror" name="nisn" value="{{ old('nisn') }}" placeholder="Masukkan NISN">

                                <!-- error message untuk nisn -->
                                @error('nisn')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Nama</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" placeholder="Masukkan Nama">
                                <!-- error message untuk nama -->
                                @error('nama')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="">Jenis Kelamin</label>
                                <select type="text" class="form-control @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin" value="{{ old('jenis_kelamin') }}" placeholder="Masukkan Jenis Kelamin">
                                    <option value="">-</option>
                                    <option value="Laki-laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                                <!-- error message untuk jenis_kelamin -->
                                @error('jenis_kelamin')
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
@endsection
 --}}
