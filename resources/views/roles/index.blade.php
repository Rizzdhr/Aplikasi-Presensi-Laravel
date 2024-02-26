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
                        @can('create-role')
                            <h1>Role</h1>
                        @endcan
                    </div>
                    <div class="col text-right">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
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
                    <a href="{{ route('roles.create') }}" class="btn btn-success"><i class="fas fa-plus"></i> Tambah</a>
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
                                        Role
                                    </th>
                                    <th style="width: 20%">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($roles as $role)
                                    <tr>
                                        <td class="text-truncate">{{ $loop->iteration }}</td>
                                        <td class="text-truncate">{{ $role->name }}</td>
                                        <td class="text-truncate">
                                            <form action="{{ route('roles.destroy', $role->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')

                                                <a href="{{ route('roles.show', $role->id) }}"
                                                    class="btn btn-primary btn-sm"> <i class="fas fa-folder">
                                                    </i>
                                                    Show</a>

                                                @if ($role->name != 'Admin')
                                                    @can('edit-role')
                                                        <a href="{{ route('roles.edit', $role->id) }}"
                                                            class="btn btn-info btn-sm"> <i class="fas fa-pencil-alt">
                                                            </i> Edit</a>
                                                    @endcan

                                                    @can('delete-role')
                                                        @if ($role->name != Auth::user()->hasRole($role->name))
                                                            <button type="button" onclick="confirmDelete()"
                                                                class="btn btn-danger btn-sm">
                                                                <i class="fas fa-trash">
                                                                </i>
                                                                HAPUS</button>
                                                        @endif
                                                    @endcan
                                                @endif

                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <td colspan="3">
                                        <span class="text-danger">
                                            <strong>No Role Found!</strong>
                                        </span>
                                    </td>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $roles->links() }}
                    </div>
                </div>
            </div>
        </section>
    </div>


@endsection



{{-- @can('edit_data') --}}
{{-- <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-info btn-sm">
                                            <i class="fas fa-pencil-alt">
                                            </i>Edit</a> --}}

{{-- @endcan --}}

{{-- @can('delete_data') --}}
{{-- <form id="deleteForm" action="{{ route('roles.destroy', $role->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-sm btn-danger"
                                                    onclick="confirmDelete()">
                                                    <i class="fas fa-trash">
                                                    </i>
                                                    HAPUS</button>
                                            </form> --}}

{{-- @endcan --}}
