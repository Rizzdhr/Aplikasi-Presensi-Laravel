@extends('layouts.main')
@section('judul', 'Tambah User')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Tambah</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Project Add</li>
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
                            <h3 class="card-title">Tambah User</h3>
                        </div>
                        <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="guru_id">Guru</label>
                                    <select class="selectpicker form-control" data-live-search="true" id="guru_id"
                                        name="guru_id" {{ $dataGuru→count() < 0 ? 'disabled' : '' }}>
                                        <option {{ old('guru_id') ? '' : 'selected' }}>-PILIH-</option>
                                        @foreach ($dataGuru as $guru)
                                            <option data-tokens="{{ $guru->id }}"
                                                {{ (int) old('guru_id') == (int) $guru->id ? 'selected' : '' }}
                                                value={{ $guru->id }}>
                                                {{ $guru->nama . ' ( ' . $guru->nip . ' ) ' }}
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
                            </div>

                        @endsection
