@extends('layouts.main')
@section('judul', 'Presensi')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Siswa Kelas
                            {{ $presensis->tingkat_kelas . ' ' . $presensis->jurusan->nama_jurusan . ' ' . $presensis->nomor_kelas }}
                        </h1>

                        {{-- @can('create_data') --}}

                        {{-- @endcan --}}
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Data Siswa</li>
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
                        <h5>Form Presensi {{ ' (' . Carbon\Carbon::now('Asia/Jakarta')->translatedFormat('d F Y') . ')' }}</h5>
                    {{-- <form action="{{ route('presensis.filter', ['id' => $presensis->id]) }}" method="get">
                        <div class="d-flex col-sm-3 align-items-center">
                            <label for="tanggal">Tanggal:</label>
                            <div class="input-group">
                                <input type="date" name="tanggal" id="tanggal" class="form-control ml-2 mb-2">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary ml-2 mb-2">Filter</button>
                                </div>
                            </div>
                        </div>
                    </form> --}}

                    <form action="{{ route('presensis.store', ['id' => $presensis->id]) }}" method="post">
                        @csrf

                        <div class="d-flex col-sm-3 align-items-center">
                            <label for="tanggal">Mapel:</label>
                            <select name="mapel_id" class="form-select ml-2 @error('mapel_id') is-invalid @enderror"
                                value="{{ old('mapel_id') }}">
                                <option selected disabled>-Pilih mata pelajaran-</option>
                                @foreach ($mapels as $mapel)
                                    <option value="{{ $mapel->id }}">
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
                                            Keterangan
                                        </th> --}}
                                    {{-- <th style="">
                                        Action
                                    </th> --}}
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($presensis->siswa as $index => $res)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="text-truncate">{{ $res->nisn }}</td>
                                        <td class="text-truncate">{{ $res->nama }}</td>
                                        <td>
                                            <input type="hidden" name="siswa_id" value="{{ $res->id }}">
                                            <select name="keterangan" class="form-control form-select">
                                                <option value="Hadir">Hadir</option>
                                                <option value="Izin">Izin</option>
                                                <option value="Sakit">Sakit</option>
                                                <option value="Alpha">Alpha</option>
                                            </select>
                                            {{-- <input type="datetime-local" name="waktu"> --}}
                                            {{-- <button type="submit">Presensi</button> --}}

                                            {{-- <select name="siswa[{{ $index }}][status]"
                                                    class="form-control form-select" id="">
                                                    <option value="Hadir">Hadir</option>
                                                    <option value="Izin">Izin</option>
                                                    <option value="Sakit">Sakit</option>
                                                    <option value="Alpha">Alpha</option>
                                                </select> --}}
                                        </td>
                                        {{-- <td class="text-truncate">
                                                <input type="text" name="siswa[{{ $index }}][keterangan]" class="form-control" placeholder="Masukkan keterangan">
                                            </td> --}}


                                    </tr>

                                @empty
                                    {{-- <div class="alert alert-danger">
                                    Data Siswa belum Tersedia.
                                </div> --}}
                                @endforelse
                            </tbody>

                        </table>
                        <button type="submit" class="btn btn-success float-right">Simpan</button>

                    </div>
                </div>
                </form>
            </div>
        </section>
    </div>

@endsection
