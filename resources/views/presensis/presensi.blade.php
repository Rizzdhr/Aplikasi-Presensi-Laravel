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
                        <h1>Presensi {{ ' (' . Carbon\Carbon::now('Asia/Jakarta')->translatedFormat('d F Y') . ')' }}</h1>
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
                    <a>Daftar Kelas</a>
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
                                    <th style="">
                                        Kelas
                                    </th>
                                    <th>
                                        Wali Kelas
                                    </th>
                                    <th style="">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($presensis as $kelas)
                                    <tr>
                                        <td>{{ $loop->iteration}}</td>
                                        <td class="text-truncate">{{ $kelas->hasil_kelas }}</td>
                                        {{-- <td>
                                        <a href="{{ route('kelass.show', $kelas->id) }}">{{ $kelas->kelas }}</a>
                                    </td> --}}
                                        {{-- <td>{{ $kelas->jurusan->nama_jurusan }}</td> --}}
                                        <td class="text-truncate">{{ $kelas->guru->nama }}</td>

                                        <td class="text-truncate">
                                            <form id="deleteForm" action="{{ route('kelass.destroy', $kelas->id) }}"
                                                method="POST">
                                                <a class="btn btn-primary btn-sm"
                                                    href="{{ route('presensis.show', $kelas->id) }}">
                                                    <i class="fas fa-folder">
                                                    </i>
                                                    View
                                                </a>

                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    {{-- <div class="alert alert-danger">
                                    Data Kelas belum Tersedia.
                                </div> --}}
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>


@endsection
