@extends('layouts.main')
@section('judul', 'Daftar Kelas')


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
                            <li class="breadcrumb-item active">Data Kelas</li>
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
                    <a>Cetak Laporan</a>
                    {{-- <a href="{{ route('kelass.create') }}" class="btn btn-success"><i class="fas fa-plus"></i> Tambah</a> --}}
                </div>
                <div class="card-body ">
                    <div class="table-responsive">
                        <table id="tabledata" class="display table projects">
                            <thead class="table-dark">
                                <tr>
                                    <th style="width: 1%">
                                        No
                                    </th>
                                    <th>
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
                                        <td>{{ $presensi->siswas->nisn }}</td>
                                        <td>{{ $presensi->siswas->nama }}</td>
                                        <td>{{ $presensi->kelas->hasil_kelas }}</td>
                                        <td>{{ $presensi->users->username }}</td>
                                        <td>{{ $presensi->mapels->nama_mapel }}</td>
                                        <td>{{ $presensi->presensi }}</td>
                                        <td>{{ $presensi->created_at ? $presensi->created_at->format('d F Y') : 'N/A ' }}
                                        </td>
                                        <td>
                                            <form class="text-truncate" id="deleteForm"
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
                                                <button type="button" onclick="confirmDelete()"
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
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
