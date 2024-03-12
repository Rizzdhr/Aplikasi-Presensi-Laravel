@extends('layouts.main')

@section('judul', 'Detail Kelas')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="d-flex col-sm-6 align-items-center">
                        <a href="{{ route('kelass.index') }}" class="btn btn-dark"><i class="fas fa-arrow-left nav-icon"></i>
                        </a>
                        <span class="ml-2">
                            <h1>Siswa Kelas {{ $kelas->hasil_kelas }}</h1>
                        </span>
                        {{-- @can('create_data') --}}
                        {{-- <a href="{{ route('siswas.create') }}" class="btn btn-success">Tambah Data</a> --}}

                        {{-- @endcan --}}
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                @can('create-data')
                    <div class="card-header">
                        <a href="{{ route('siswas.create') }}" class="btn btn-success"><i class="fas fa-plus"></i> Tambah</a>

                    </div>
                @endcan
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tabledata" class="table projects">
                            <thead class="table-dark ">
                                <tr>
                                    <th style="width: 1%">
                                        No
                                    </th>
                                    <th style="">
                                        Nama
                                    </th>
                                    <th style="">
                                        NISN
                                    </th>
                                    <th class="text-truncate" style="">
                                        Jenis Kelamin
                                    </th>
                                    @can('edit-data|delete-data')
                                        <th style="">
                                            Action
                                        </th>
                                    @endcan
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($siswas as $siswa)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="text-truncate">{{ $siswa->nama }}</td>
                                        <td class="text-truncate">{{ $siswa->nisn }}</td>
                                        <td class="text-truncate">{{ $siswa->jenis_kelamin }}</td>

                                        @can('edit-data|delete-data')
                                            <td class="text-truncate">
                                                <form id="deleteForm" action="{{ route('siswas.destroy', $siswa->id) }}"
                                                    method="POST">
                                                    {{-- <a class="btn btn-primary btn-sm"
                                                    href="{{ route('siswas.show', $siswa->id) }}">
                                                    <i class="fas fa-folder">
                                                    </i>
                                                    View
                                                </a> --}}

                                                    <a href="{{ route('siswas.edit', $siswa->id) }}"
                                                        class="btn btn-info btn-sm"><i class="fas fa-pencil-alt">
                                                        </i>
                                                        EDIT
                                                    </a>

                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-sm btn-danger"
                                                        onclick="confirmDelete()">
                                                        <i class="fas fa-trash">
                                                        </i>
                                                        HAPUS</button>
                                                </form>
                                            </td>
                                        @endcan
                                    </tr>
                                @empty
                                    {{-- <div class="alert alert-danger">
                                    Data Siswa belum Tersedia.
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
