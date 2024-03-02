@extends('layouts.main')
@section('judul', 'Edit Data Siswa')


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="d-flex col-sm-6 align-items-center">
                        <a href="{{ url()->previous() }}" class="btn btn-dark"><i class="fas fa-arrow-left nav-icon"></i></a>
                        <span class="ml-2">
                            <h1>Edit Data Presensi</h1>
                        </span>
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
                            <h3 class="card-title">Data Siswa</h3>

                            {{-- <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div> --}}
                        </div>
                        <form action="{{ route('presensis.update', $presensi->id) }}" method="POST">
                            @csrf

                            @method('PUT')

                            <div class="card-body">
                                {{-- <input type="hidden" value="{{ old('kelas_id', $presensi->kelas_id) }}" name="kelas_id"> --}}
                                {{-- <input type="hidden" value="{{ old('siswa_id', $presensi->siswa_id) }}" name="siswa_id"> --}}

                                <div class="form-group">
                                    <label for="">Nama Siswa</label>
                                    <select name="siswa_id" class="form-control @error('siswa_id') is-invalid @enderror"
                                        id="siswa" disabled>
                                        @foreach ($siswas as $siswa)
                                            <option value="{{ $siswa->id }}"
                                                {{ old('siswa_id', $presensi->siswa_id) == $siswa->id ? 'selected' : '' }}>
                                                {{ $siswa->nama }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('siswa_id')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for="">Kelas</label>
                                    <select name="kelas_id" class="form-control @error('kelas_id') is-invalid @enderror"
                                        id="kelas" disabled>
                                        @foreach ($kelas as $kelasitem)
                                            <option value="{{ $kelasitem->id }}"
                                                {{ old('kelas_id', $presensi->kelas_id) == $kelasitem->id ? 'selected' : '' }}>
                                                {{ $kelasitem->hasil_kelas }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('kelas_id')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="">Guru</label>
                                    <select name="user_id" class="form-control @error('user_id') is-invalid @enderror"
                                        id="user">
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}"
                                                {{ old('user_id', $presensi->user_id) == $user->id ? 'selected' : '' }}>
                                                {{ $user->username }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('user_id')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="">Mata Pelajaran</label>
                                    <select name="mapel_id" id="mapel" class="form-select">
                                        @foreach ($mapel as $mapels)
                                            <option value="{{ old('mapel_id', $mapels->id) }}"
                                                {{ old('mapel_id', $presensi->mapel_id) == $mapels->id ? 'selected' : '' }}>
                                                {{ $mapels->nama_mapel }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('mapel_id')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for="">Keterangan</label>
                                    <select class="form-select" name="presensi">
                                        <option id="hadir" value="Hadir"
                                            {{ $presensi->presensi == 'Hadir' ? 'selected' : '' }} required>Hadir
                                        </option>
                                        <option id="izin" value="Izin"
                                            {{ $presensi->presensi == 'Izin' ? 'selected' : '' }} required>Izin
                                        </option>
                                        <option id="sakit" value="Sakit"
                                            {{ $presensi->presensi == 'Sakit' ? 'selected' : '' }} required>Sakit
                                        </option>
                                        <option id="alpha" value="Alpha"
                                            {{ $presensi->presensi == 'Alpha' ? 'selected' : '' }} required>Alpha
                                        </option>
                                    </select>
                                </div>


                                <button type="submit" class="btn btn-success">Simpan</button>
                                {{-- <button type="reset" class="btn btn-secondary">Reset</button> --}}

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
                        <form action="{{ route('students.update', $student->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">NISN</label>
                                <input type="text" class="form-control @error('nisn') is-invalid @enderror" name="nisn" value="{{ old('nisn', $student->nisn) }}" >

                                <!-- error message untuk nis -->
                                @error('nisn')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Nama</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama', $student->nama) }}" >
                                <!-- error message untuk nama -->
                                @error('nama')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="">Jenis Kelamin</label>
                                <select type="text" class="form-control @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin" value="{{ old('jenis_kelamin', $student->jenis_kelamin) }}" >
                                    <option value="">-</option>
                                    <<option value="Laki-laki" {{ old('jenis_kelamin', $student->jenis_kelamin) === 'Laki-laki' ? 'selected' : '' }}>Laki-Laki</option>
                                    <option value="Perempuan" {{ old('jenis_kelamin', $student->jenis_kelamin) === 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                                <!-- error message untuk jenis_kelamin -->
                                @error('jenis_kelamin')
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
@endsection
</body>
</html> --}}
