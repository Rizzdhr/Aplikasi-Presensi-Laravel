@extends('layouts.main')
@section('judul', 'Tambah Data User')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Tambah User</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('user.index')}}">User</a></li>
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
                            <h3 class="card-title">User</h3>
                        </div>

                        <form action="{{ route('user.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"  placeholder="Email" required>
                                </div>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="****" required>
                                </div>

                                <div class="form-group">
                                    <label for="guru_id">Guru</label>
                                    <select class="selectpicker form-control" data-live-search="true" id="guru_id"
                                        name="guru_id" {{ $dataGuru->count() < 0 ? 'disabled' : '' }}>
                                        <option {{ old('guru_id') ? '' : 'selected' }}>--PILIH--</option>
                                        @foreach ($dataGuru as $guru)
                                            <option data-tokens="{{ $guru->id }}"
                                                {{ (int) old('guru_id') == (int) $guru->id ? 'selected' : '' }}
                                                value={{ $guru->id }}>
                                                {{ $guru->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if ($dataGuru->count() < 0)
                                        <p class="text-danger mt-1">
                                            Data guru kosong! <a href="{{ route('guru.create') }}"
                                                class="text-decoration-none">Tambah</a>
                                        </p>
                                    @endif
                                    @error('guru_id')
                                        <div class="text-danger mt-1">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="roles">Role</label>
                                    <br>
                                    @foreach ($roles as $role)
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="roles[]"
                                                value="{{ $role->id }}" id="role{{ $role->id }}">
                                            <label class="form-check-label" for="role{{ $role->id }}">
                                                {{ $role->nama }}
                                            </label>
                                        </div>
                                    @endforeach
                                    {{-- <select class="form-select" multiple aria-label="Multiple select example" id="roles" name="roles[]" required>
                                        <option selected disabled>Select</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->nama }}</option>
                                        @endforeach
                                    </select> --}}
                                </div>

                                <button type="submit" class="btn btn-success">Buat User</button>
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
