@extends('layouts.main')
@section('judul', 'Data Kelas')


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Data Kelas</h1>

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
                @can('create-data')
                    <div class="card-header">
                        <a href="{{ route('kelass.create') }}" class="btn btn-success"><i class="fas fa-plus"></i> Tambah</a>
                    </div>
                @endcan

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
                                @forelse ($kelass as $kelas)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="text-truncate">{{ $kelas->hasil_kelas }}</td>
                                        <td class="text-truncate">{{ $kelas->guru->nama }}</td>
                                        {{-- <td class="text-center" --}}
                                        <td class="text-truncate">
                                            <form id="deleteForm" action="{{ route('kelass.destroy', $kelas->id) }}"
                                                method="POST" class=" ">

                                                <a class="btn btn-primary btn-sm"
                                                    href="{{ route('kelass.show', $kelas->id) }}">
                                                    <i class="fas fa-folder">
                                                    </i>
                                                    View
                                                </a>

                                                @can('edit-data')
                                                    <a href="{{ route('kelass.edit', $kelas->id) }}"
                                                        class="btn btn-info btn-sm"><i class="fas fa-pencil-alt">
                                                        </i>
                                                        Edit
                                                    </a>
                                                @endcan

                                                @can('delete-data')
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                        onclick="confirmDelete()">
                                                        <i class="fas fa-trash">
                                                        </i>
                                                        HAPUS</button>
                                                @endcan
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
