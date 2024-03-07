@extends('layouts.main')
@section('judul', 'Tambah User')

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
                            <h1>Tambah User</h1>
                        </span>
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

                        <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="guru_id">Guru</label>
                                    <select class="selectpicker form-control" data-live-search="true" id="guru_id"
                                        name="guru_id" {{ $dataGuru->count() < 0 ? 'disabled' : '' }}>
                                        <option {{ old('guru_id') ? '' : 'selected' }} disabled>--PILIH--</option>
                                        @foreach ($dataGuru as $guru)
                                            <option data-tokens="{{ $guru->id }}"
                                                {{ (int) old('guru_id') == (int) $guru->id ? 'selected' : '' }}
                                                value="{{ $guru->id }}">
                                                {{ $guru->nama . ' (' . $guru->nip . ') ' }}
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

                                {{-- <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control @error('username') is-invalid @enderror"
                                        id="username" name="username" value="{{ old('username') }}">
                                    @if ($errors->has('username'))
                                        <span class="text-danger">{{ $errors->first('username') }}</span>
                                    @endif
                                </div> --}}

                                <div class="form-group">
                                    <label for="email">Email </label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        id="email" name="email" value="{{ old('email') }}">
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        id="password" name="password">
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="roles">Role</label>
                                    <div class="d-flex">
                                        @forelse ($roles as $role)
                                            @if ($role != 'Admin')
                                                <div class="form-check me-3">
                                                    <input class="form-check-input @error('roles') is-invalid @enderror"
                                                        type="checkbox" value="{{ $role }}"
                                                        id="{{ $role }}" name="roles[]"
                                                        {{ in_array($role, old('roles') ?? []) ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="{{ $role }}">
                                                        {{ $role }}
                                                    </label>
                                                </div>
                                            @else
                                                @if (Auth::user()->hasRole('Admin'))
                                                    <div class="form-check me-3">
                                                        <input class="form-check-input @error('roles') is-invalid @enderror"
                                                            type="checkbox" value="{{ $role }}"
                                                            id="{{ $role }}" name="roles[]"
                                                            {{ in_array($role, old('roles') ?? []) ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="{{ $role }}">
                                                            {{ $role }}
                                                        </label>
                                                    </div>
                                                @endif
                                            @endif
                                        @empty
                                            <!-- Handle empty roles -->
                                        @endforelse

                                        @if ($errors->has('roles'))
                                            <span class="text-danger">{{ $errors->first('roles') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-success">Tambah</button>

                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
    </div>

    </section>
    <!-- /.content -->
    </div>
@endsection



{{-- <div class="form-group">
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
    <div class="d-flex">
        @forelse ($roles as $role)
            <div class="form-check me-2">
                <label class="form-check-label">
                    <input name="roles[]" type="checkbox" value="{{ $role->id }}"
                        class="form-check-input">
                    {{ (old('roles')[$loop->index] ?? '') == $role->id ? 'checked' : '' }}
                    {{ $role->nama }}
                </label>
            </div>
        @empty
            <p class="text-danger mt-1">
                Data role kosong! <a href="{{ route('role.create') }}"
                    class="text-decoration-none">Tambah</a>
            </p>
        @endforelse
    </div>
    @error('roles')
        <div class="text-danger mt-1">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" id="email" name="email"
        placeholder="Email Guru" value="{{ old('email') }}">
    @error('email')
        <div class="text-danger mt-1">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password"
        placeholder="****" value="{{ old('password') }}">
    @error('email')
        <div class="text-danger mt-1">
            {{ $message }}
        </div>
    @enderror
</div> --}}
