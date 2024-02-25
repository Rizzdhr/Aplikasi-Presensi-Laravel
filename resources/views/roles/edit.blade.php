@extends('layouts.main')
@section('judul', 'Edit Role')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="d-flex col-sm-6 align-items-center">
                        <a href="{{ url()->previous() }}" class="btn btn-dark"><i class="fas fa-arrow-left nav-icon"></i></a>
                        <span class="ml-2">
                            <h1>Edit Role</h1>
                        </span>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-6 container">
                    <div class="card card-dark">
                        <div class="card-header">
                            <h3 class="card-title">Role</h3>

                            <div class="card-tools">
                                {{-- <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button> --}}
                            </div>
                        </div>

                        <form action="{{ route('roles.update', $role->id) }}" method="post">
                            @csrf

                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama_mapel">Nama</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" name="name" value="{{ $role->name }}">

                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif

                                    @error('nama_mapel')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="permissions">Permissions</label>
                                    <select class="form-select @error('permissions') is-invalid @enderror" multiple
                                        aria-label="Permissions" id="permissions" name="permissions[]"
                                        style="height: 210px;">
                                        @forelse ($permissions as $permission)
                                            <option value="{{ $permission->id }}"
                                                {{ in_array($permission->id, $rolePermissions ?? []) ? 'selected' : '' }}>
                                                {{ $permission->name }}
                                            </option>
                                        @empty
                                        @endforelse
                                    </select>
                                    @if ($errors->has('permissions'))
                                        <span class="text-danger">{{ $errors->first('permissions') }}</span>
                                    @endif
                                </div>

                                <button type="submit" class="btn btn-success">Simpan</button>
                                {{-- <button type="reset" class="btn btn-secondary">Reset</button> --}}

                            </div>
                        </form>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>
@endsection
