@extends('layouts.main')
@section('judul', 'Data Jurusan')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Data Jurusan</h1>
                        {{-- @can('create_data') --}}

                        {{-- @endcan --}}
                    </div>
                    <div class="col text-right">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
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
                    <a href="{{ route('jurusans.create') }}" class="btn btn-success"><i class="fas fa-plus"></i> Tambah</a>
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

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tabledata" class="table projects">
                            <thead class="table-dark">
                                <tr>
                                    <th style="width: 1%">
                                        No
                                    </th>
                                    <th style="width: 20%">
                                        Jurusan
                                    </th>
                                    <th style="width: 20%">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jurusans as $jurusan)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="text-truncate">{{ $jurusan->nama_jurusan }}</td>
                                        <td>
                                            <form class="text-truncate" id="deleteForm"
                                                action="{{ route('jurusans.destroy', $jurusan->id) }}" method="POST">
                                                {{-- <a class="btn btn-primary btn-sm"
                                                    href="{{ route('jurusans.show', $jurusan->id) }}">
                                                    <i class="fas fa-folder">
                                                    </i>
                                                    View
                                                </a> --}}

                                                {{-- @can('edit_data') --}}
                                                <a href="{{ route('jurusans.edit', $jurusan->id) }}"
                                                    class="btn btn-info btn-sm">
                                                    <i class="fas fa-pencil-alt">
                                                    </i>Edit</a>

                                                {{-- @endcan --}}

                                                {{-- @can('delete_data') --}}
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-danger btn-sm"
                                                    onclick="confirmDelete()">
                                                    <i class="fas fa-trash">
                                                    </i>
                                                    HAPUS</button>
                                            </form>

                                            {{-- @endcan --}}
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
