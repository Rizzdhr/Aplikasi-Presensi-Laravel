@extends('layouts.main')
@section('judul', 'Tambah Role')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Tambah Role</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Role</a></li>
                            <li class="breadcrumb-item active">Tambah</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-6 container">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Role</h3>

                            <div class="card-tools">
                                {{-- <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button> --}}
                            </div>
                        </div>

                        <form action="{{ route('roles.store') }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Nama</label>

                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" name="name" value="{{ old('name') }}">
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="permissions">Permissions</label>
                                    <select class="form-select @error('permissions') is-invalid @enderror" multiple
                                        aria-label="Permissions" id="permissions" name="permissions[]"
                                        style="height: 210px;">
                                        @forelse ($permissions as $permission)
                                            <option value="{{ $permission->id }}"
                                                {{ in_array($permission->id, old('permissions') ?? []) ? 'selected' : '' }}>
                                                {{ $permission->name }}
                                            </option>
                                        @empty
                                        @endforelse
                                    </select>
                                    @if ($errors->has('permissions'))
                                        <span class="text-danger">{{ $errors->first('permissions') }}</span>
                                    @endif
                                </div>

                                <button type="submit" class="btn btn-success">Tambah</button>
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


{{-- <form action="{{ route('roles.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama">Role</label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"
                                        value="{{ old('nama') }}" >
                                    @error('nama')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </div>
                        </form> --}}
