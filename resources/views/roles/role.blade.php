@extends('layouts.main')
@section('judul', 'Role')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Role</h1>
                        <br>
                        {{-- @can('create_data') --}}
                        <a href="{{ route('roles.create') }}" class="btn btn-success">Tambah Role</a>

                        {{-- @endcan --}}
                    </div>
                    <div class="col text-right">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Role</li>
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
                    <h3 class="card-title">Role</h3>
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
                                <th style="width: 20%">
                                    Role
                                </th>
                                <th style="width: 20%">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                                <tr>
                                    <td>{{ $counter++ }}</td>
                                    <td>{{ $role->nama }}</td>
                                    <td>

                                        {{-- @can('edit_data') --}}
                                        {{-- <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-info btn-sm">
                                            <i class="fas fa-pencil-alt">
                                            </i>Edit</a> --}}

                                        {{-- @endcan --}}

                                        {{-- @can('delete_data') --}}
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');""
                                        action="{{ route('roles.destroy', $role->id) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash">
                                                </i>
                                                HAPUS</button>
                                        </form>

                                        {{-- @endcan --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                </div>
            </div>
        </section>
    </div>


@endsection
