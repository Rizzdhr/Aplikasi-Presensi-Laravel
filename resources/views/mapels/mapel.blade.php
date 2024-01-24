@extends('layouts.main')
@section('judul', 'Data Mata Pelajaran')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Data Mata Pelajaran</h1>
                        <br>
                        <a href="{{ route('mapels.create') }}" class="btn btn-success">Tambah Data</a>
                    </div>
                    <div class="col text-right">
                        <ol class="breadcrumb float-sm-right">l
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Data Jurusan</li>
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
                    <h3 class="card-title">Data Mata Pelajaran</h3>
                    {{-- <div class="card-tools float-left">
                    <a href="{{ route('kelass.create')}}" class="btn btn-success">Tambah Data</a>
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
                                    Mata Pelajaran
                                </th>
                                <th style="">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mapels as $mapel)
                                <tr>
                                    <td>{{ $counter++ }}</td>
                                    <td>{{ $mapel->nama_mapel }}</td>
                                    <td>
                                        <a href="{{ route('mapels.edit', $mapel->id) }}"
                                            class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('mapels.destroy', $mapel->id) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus mapel ini?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                </div>
            </div>
        </section>
    </div>


@endsection
