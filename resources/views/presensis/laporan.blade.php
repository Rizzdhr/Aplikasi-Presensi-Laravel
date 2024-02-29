@extends('layouts.main')
@section('judul', 'Laporan')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Laporan</h1>
                        {{-- @can('create_data') --}}

                        {{-- @endcan --}}
                    </div>
                    <div class="col text-right">
                        <ol class="breadcrumb float-sm-right ">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Laporan</li>
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
                    <form action="{{ route('laporan.filter') }}" method="post">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <a>Kelas</a>
                                {{-- <label for="kelas">Kelas:</label> --}}
                                <select class="form-select" id="kelasSelect" name="kelas_id">
                                    <option value="" {{ empty(request('kelas')) ? 'selected' : '' }}>Semua Kelas
                                    </option>
                                    @foreach ($kelas as $kelasItem)
                                        <option value="{{ $kelasItem->id }}"
                                            {{ request('kelas') == $kelasItem->id ? 'selected' : '' }}>
                                            {{ $kelasItem->hasil_kelas }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-3">
                                <a>Tanggal Mulai:</a>
                                {{-- <label for="TanggalMulai">Tanggal Mulai:</label> --}}
                                <input type="date" class="form-control" id="TanggalMulai" name="TanggalMulai"
                                    value="{{ old('TanggalMulai') }}">
                            </div>

                            <div class="col-md-3">
                                <a>Tanggal Selesai:</a>
                                {{-- <label for="TanggalSelesai">Tanggal Selesai:</label> --}}
                                <input type="date" class="form-control" id="TanggalSelesai" name="TanggalSelesai"
                                    value="{{ request('TanggalSelesai') }}">
                            </div>

                            <div class="col-md-3 mt-4">
                                <button type="submit" class="btn btn-primary">Filter</button>
                            </div>

                        </div>

                        {{-- <a href="{{ route('laporan.export') }}" class="btn btn-success btn-md">EXPORT</a> --}}
                    </form>
                    {{-- <a href="{{ route('kelass.create') }}" class="btn btn-success"><i class="fas fa-plus"></i> Tambah</a> --}}
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tabledata2" class="display table projects table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th style="">
                                        No
                                    </th>
                                    <th class="text-left">
                                        NISN
                                    </th>
                                    <th>
                                        Nama
                                    </th>
                                    <th style="">
                                        Kelas
                                    </th>
                                    <th>
                                        Guru
                                    </th>
                                    <th>
                                        Mapel
                                    </th>
                                    <th>
                                        keterangan
                                    </th>
                                    <th>
                                        Bln/Tgl/Thn
                                    </th>
                                    <th style="">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($presensis as $presensi)
                                    <tr data-kelas="{{ $presensi->siswas->kelas_id }}">
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="text-left">{{ $presensi->siswas->nisn }}</td>
                                        <td class="text-truncate">{{ $presensi->siswas->nama }}</td>
                                        <td class="text-truncate">{{ $presensi->kelas->hasil_kelas }}</td>
                                        <td class="text-truncate">{{ $presensi->users->username }}</td>
                                        <td class="text-truncate">{{ $presensi->mapels->nama_mapel }}</td>
                                        <td>{{ $presensi->presensi }}</td>
                                        <td class="text-truncate">
                                            {{ $presensi->created_at ? $presensi->created_at->format('d F Y') : 'N/A ' }}
                                        </td>
                                        <td>
                                            <form id="deleteForm{{ $presensi->id }}"x`
                                                action="{{ route('presensis.destroy', $presensi->id) }}" method="POST">

                                                {{-- @can('edit_data') --}}
                                                <a href="{{ route('presensis.edit', $presensi->id) }}"
                                                    class="btn btn-info btn-sm">
                                                    <i class="fas fa-pencil-alt">
                                                    </i>Edit</a>

                                                {{-- @endcan --}}

                                                {{-- @can('delete_data') --}}
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" onclick="confirmDelete('{{ $presensi->id }}')"
                                                    class="btn btn-danger btn-sm">
                                                    <i class="fas fa-trash">
                                                    </i>
                                                    HAPUS</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- {{ $presensis->links() }} --}}

                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
