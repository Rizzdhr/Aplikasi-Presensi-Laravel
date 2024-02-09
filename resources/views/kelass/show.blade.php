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
                        <h1>Detail Kelas {{ $kelas->hasil_kelas }}</h1>
                        <br>
                        {{-- @can('create_data') --}}
                        {{-- <a href="{{ route('siswas.create') }}" class="btn btn-success">Tambah Data</a> --}}

                        {{-- @endcan --}}
                    </div>
                    <div class="col text-right">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('kelass.index') }}">Data Kelas</a></li>
                            <li class="breadcrumb-item active">Detail</li>
                        </ol>
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
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
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
                                        <td>{{ $siswa->jenis_kelamin }}</td>

                                        <td class="text-center">
                                            <form id="deleteForm" action="{{ route('siswas.destroy', $siswa->id) }}"
                                                method="POST">
                                                <a class="btn btn-primary btn-sm"
                                                    href="{{ route('siswas.show', $siswa->id) }}">
                                                    <i class="fas fa-folder">
                                                    </i>
                                                    View
                                                </a>

                                                {{-- @can('edit_data') --}}
                                                <a href="{{ route('siswas.edit', $siswa->id) }}"
                                                    class="btn btn-info btn-sm"><i class="fas fa-pencil-alt">
                                                    </i>
                                                    EDIT
                                                </a>

                                                {{-- @endcan --}}

                                                {{-- @can('delete_data') --}}
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-sm btn-danger"
                                                    onclick="confirmDelete()">
                                                    <i class="fas fa-trash">
                                                    </i>
                                                    HAPUS</button>
                                            </form>

                                            {{-- @endcan --}}
                                        </td>
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
