@extends('layouts.main')
@section('judul', 'User')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>User</h1>
                        {{-- @can('create_data') --}}
                        {{-- @endcan --}}
                    </div>
                    <div class="col text-right">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">User</li>
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
                    <a href="{{ route('user.create') }}" class="btn btn-success"><i class="fas fa-plus"></i> Tambah</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tabledata" class="table projects">
                            <thead class="table-dark">
                                <tr>
                                    <th style="width: 1%">
                                        No
                                    </th>
                                    {{-- <th>
                                        NIP
                                    </th> --}}
                                    <th style="">
                                        Nama
                                    </th>
                                    <th style="">
                                        Email
                                    </th>
                                    <th style="">
                                        Role
                                    </th>
                                    <th style="">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        {{-- <td>{{ $user->guru->nip }}</td> --}}
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <ul>
                                                @foreach ($user->roles as $role)
                                                    <li>
                                                        {{ $role->name }}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td>
                                            <form id="deleteForm" action="{{ route('user.destroy', $user->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <a href="{{ route('users.show', $user->id) }}"
                                                    class="btn btn-primary btn-sm"> <i class="fas fa-folder">
                                                    </i>
                                                    Show</a>

                                                @if (in_array('Admin', $user->getRoleNames()->toArray() ?? []))
                                                    @if (Auth::user()->hasRole('Admin'))
                                                        <a href="{{ route('users.edit', $user->id) }}"
                                                            class="btn btn-info btn-sm">
                                                            <i class="fas fa-pencil-alt">
                                                            </i>Edit</a>
                                                    @endif
                                                @else
                                                    @can('edit-user')
                                                        <a href="{{ route('users.edit', $user->id) }}"
                                                            class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i>
                                                            Edit</a>
                                                    @endcan

                                                    @can('delete-user')
                                                        @if (Auth::user()->id != $user->id)
                                                            <button type="button" class="btn btn-sm btn-danger"
                                                                onclick="confirmDelete()">
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
                                    <td colspan="5">
                                        <span class="text-danger">
                                            <strong>No User Found!</strong>
                                        </span>
                                    </td>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </section>
    </div>


@endsection
