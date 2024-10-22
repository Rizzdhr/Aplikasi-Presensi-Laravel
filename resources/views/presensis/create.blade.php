@extends('layouts.main')
@section('judul', 'Presensi')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="d-flex col-sm-6 align-items-center">
                        <a href="{{ route('presensis.index') }}" class="btn btn-dark"><i
                                class="fas fa-arrow-left nav-icon"></i></a>
                        <span class="ml-2">
                            <h1>Presensi {{ ' (' . Carbon\Carbon::now('Asia/Jakarta')->translatedFormat('d F Y') . ')' }}
                            </h1>
                        </span>

                        {{-- @can('create_data') --}}

                        {{-- @endcan --}}
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <form action="{{ route('presensis.store') }}" method="post" id="presensiForm"
                onsubmit="return validatePresensi();">
                @csrf
                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        @foreach ($kelas as $kelasItem)
                            <h5>Siswa Kelas {{ $kelasItem->hasil_kelas }}</h5>
                        @endforeach

                        <div class="d-flex col-sm-3 align-items-center">
                            <label for="tanggal">Mapel:</label>
                            <select name="mapel_id" id="mapel"
                                class="form-select ml-2 @error('mapel_id') is-invalid @enderror">
                                <option selected disabled>-Pilih mata pelajaran-</option>
                                @foreach ($mapels as $mapel)
                                    <option value="{{ $mapel->id }}"
                                        {{ old('mapel_id', $mapel->nama_mapel) == $mapel->id ? 'selected' : '' }}>
                                        {{ $mapel->nama_mapel }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="card-body ">
                        <div class="table-responsive">
                            <table id="" class="table projects table-bordered">
                                <thead class="table-dark">
                                    <tr>
                                        <th style="width: 1%">
                                            No
                                        </th>
                                        <th style="width: 10%">
                                            NISN
                                        </th>
                                        <th style="">
                                            Nama
                                        </th>
                                        <th style="">
                                            Keterangan
                                        </th>
                                        {{-- <th style="">
                                            Action
                                        </th> --}}
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse ($siswas as $siswa)
                                        {{-- @forelse ($presensis->siswa as $index => $res) --}}
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td class="text-truncate">{{ $siswa->nisn }}</td>
                                            <td class="text-truncate">{{ $siswa->nama }}</td>
                                            <input type="hidden" name="kelas_id" value="{{ $siswa->kelas->id }} ">
                                            <input type="hidden" name="siswa_id[]" value="{{ $siswa->id }}">
                                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                            <td class="text-truncate">
                                                <input type="radio" class="btn-check"
                                                    name="presensi[{{ $siswa->id }}]" id="Hadir_{{ $siswa->id }}"
                                                    value="Hadir" autocomplete="off">
                                                <label for="Hadir_{{ $siswa->id }}" class="btn btn-outline-success">
                                                    Hadir
                                                </label>

                                                <input type="radio" class="btn-check"
                                                    name="presensi[{{ $siswa->id }}]" id="Izin_{{ $siswa->id }}"
                                                    value="Izin" autocomplete="off">
                                                <label for="Izin_{{ $siswa->id }}" class="btn btn-outline-success">
                                                    Izin
                                                </label>

                                                <input type="radio" class="btn-check"
                                                    name="presensi[{{ $siswa->id }}]" id="Sakit_{{ $siswa->id }}"
                                                    value="Sakit" autocomplete="off">
                                                <label for="Sakit_{{ $siswa->id }}" class="btn btn-outline-success">
                                                    Sakit
                                                </label>

                                                <input type="radio" class="btn-check"
                                                    name="presensi[{{ $siswa->id }}]" id="Alpha_{{ $siswa->id }}"
                                                    value="Alpha" autocomplete="off">
                                                <label for="Alpha_{{ $siswa->id }}" class="btn btn-outline-success">
                                                    Alpha
                                                </label>
                                            </td>
                                        </tr>

                                    @empty
                                        <div class="alert alert-danger">
                                            Data Siswa belum Tersedia.
                                        </div>
                                    @endforelse
                                </tbody>

                            </table>
                            <button type="submit" class="btn btn-success col-12">Simpan</button>
                            {{-- <button type="submit" class="btn btn-success float-right">Simpan</button> --}}

                        </div>
                    </div>
            </form>
    </div>
    </section>
    </div>

@endsection
