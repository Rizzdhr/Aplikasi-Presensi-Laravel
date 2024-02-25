@extends('layouts.main')
@section('judul', 'Data Guru')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Data Guru</h1>
                        {{-- @can('create_data') --}}

                        {{-- @endcan --}}
                    </div>
                    <div class="col text-right">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Data Guru</li>
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
                    <a href="{{ route('gurus.create') }}" class="btn btn-success"><i class="fas fa-plus"></i> Tambah</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tabledata" class="table projects">
                            <thead class="table-dark">
                                <tr>
                                    <th style="width: 1%">
                                        No
                                    </th>
                                    <th>
                                        NIP
                                    </th>
                                    <th style="">
                                        Nama
                                    </th>
                                    <th class="text-truncate" style="">
                                        Mata Pelajaran
                                    </th>
                                    <th class="text-truncate" style="">
                                        Jenis Kelamin
                                    </th>
                                    <th style="">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($gurus as $guru)
                                    <tr>
                                        <td>{{ $loop->iteration }} </td>
                                        <td class="text-truncate">{{ $guru->nip }}</td>
                                        <td class="text-truncate">{{ $guru->nama }}</td>
                                        <td class="text-truncate">{{ $guru->mapel->nama_mapel }}</td>
                                        <td class="text-truncate">{{ $guru->jenis_kelamin }}</td>
                                        <td>
                                            <form class="text-truncate" id="deleteForm" action="{{ route('gurus.destroy', $guru->id) }}"
                                                method="POST" >
                                                {{-- <a href="{{ route('gurus.show', $guru->id) }}"
                                                    class="btn btn-primary btn-sm">
                                                    <i class="fas fa-folder">
                                                    </i>
                                                    View</a> --}}


                                                {{-- @can('edit_data') --}}
                                                <a href="{{ route('gurus.edit', $guru->id) }}" class="btn btn-info btn-sm">
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
