@extends('layouts.main')
@section('judul', 'Data User')

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

                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table id="tabledata" class="table table-striped projects">
                            <thead>
                                <tr>
                                    <th style="width: 1%">
                                        No
                                    </th>
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
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <ul>
                                                @foreach ($user->roles as $role)
                                                    <li>
                                                        {{ $role->nama }}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td>

                                            {{-- @can('edit_data') --}}
                                            <a href="" class="btn btn-info btn-sm">
                                                <i class="fas fa-pencil-alt">
                                                </i>Edit</a>
                                            {{-- @endcan --}}

                                            {{-- @can('delete_data') --}}
                                            <form action="" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus guru ini?')"
                                                    class="btn btn-danger btn-sm">
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
