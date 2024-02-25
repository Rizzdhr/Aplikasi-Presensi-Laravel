@extends('layouts.main')
@section('judul', 'Tambah Data Mapel')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="d-flex col-sm-6 align-items-center">
                        <a href="{{ url()->previous() }}" class="btn btn-dark"><i class="fas fa-arrow-left nav-icon"></i></a>
                        <span class="ml-2"><h1>Tambah Data Mapel</h1></span>
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
                            <h3 class="card-title">Data Mata Pelajaran</h3>

                            <div class="card-tools">
                                {{-- <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button> --}}
                            </div>
                        </div>

                        <form action="{{ route('mapels.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama_mapel">Nama Mata Pelajaran</label>
                                    <input type="text" class="form-control @error('nama_mapel') is-invalid @enderror"
                                        id="nama_mapel" name="nama_mapel" value="{{ old('nama_mapel') }}" placeholder="Masukkan nama mata pelajaran">


                                    @error('nama_mapel')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-success">Tambah</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>

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
