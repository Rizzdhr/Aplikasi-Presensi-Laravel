@extends('layouts.main')

@section('judul', 'Detail Kelas')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Detail Kelas {{ $kelas->tingkat_jurusan }}</h1>
                        <br>
                        @can('create_data')
                        <a href="{{ route('siswas.create') }}" class="btn btn-success">Tambah Data</a>

                        @endcan
                    </div>
                    <div class="col text-right">
                        <a href="{{ route('kelass.index') }}" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Siswa</h3>

                    {{-- <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div> --}}
                </div>
                <div class="card-body p-0">
                    <table id="tabledata" class="table table-striped projects">
                        <thead>
                            <tr>
                                <th style="width: 1%">
                                    No
                                </th>
                                <th style="">
                                    NISN
                                </th>
                                <th style="">
                                    Nama
                                </th>
                                {{-- <th style="">
                                    Kelas
                                </th> --}}
                                <th style="">
                                    Jenis Kelamin
                                </th>
                                <th style="">
                                    Action
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($siswas as $siswa)
                                <tr>
                                    <td>{{ $counter++ }}</td>
                                    <td>{{ $siswa->nisn }}</td>
                                    <td>{{ $siswa->nama }}</td>
                                    {{-- <td>{{ $siswa->kelas->tingkat_jurusan }}</td> --}}
                                    <td>{{ $siswa->jenis_kelamin }}</td>

                                    <td class="text-center">
                                        <a class="btn btn-primary btn-sm" href="{{ route('siswas.show', $siswa->id) }}">
                                            <i class="fas fa-folder">
                                            </i>
                                            View
                                        </a>

                                        @can('edit_data')
                                        <a href="{{ route('siswas.edit', $siswa->id) }}"
                                            class="btn btn-info btn-sm"><i class="fas fa-pencil-alt">
                                            </i>">
                                            EDIT
                                        </a>

                                        @endcan

                                        @can('delete_data')
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                            action="{{ route('siswas.destroy', $siswa->id) }}" method="POST">
                                        @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash">
                                                </i>
                                                HAPUS</button>
                                        </form>

                                        @endcan
                                    </td>
                                </tr>
                            @empty
                                {{-- <div class="alert alert-danger">
                                    Data Siswa belum Tersedia.
                                </div> --}}
                            @endforelse
                </div>
            </div>
        </section>
    </div>
@endsection
