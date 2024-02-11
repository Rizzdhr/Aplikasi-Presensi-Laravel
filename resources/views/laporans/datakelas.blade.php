@extends('layouts.main')
@section('title', 'AN Absensi | Data Kelas')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Daftar Kelas</h1>
                        <br>
                    </div>
                    <div class="col text-right">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Daftar Kelas</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Daftar Kelas</h3>
                </div>

                <div class="card-body p-0">
                    <table id="tabledata" class="table table-striped projects">
                        <thead>
                            <tr>
                                <th style="width: 1%">No</th>
                                <th>Kelas</th>
                                <th>Wali kelas</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($resource as $index => $res)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $res->hasil_kelas }}</td>
                                    <td>{{ $res->guru->nama }}</td>
                                    <td>
                                        <a href="{{ route('laporans.show', $res->id) }}" class="btn btn-primary btn-sm">
                                            <i class="fas fa-folder">
                                            </i>
                                            View</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </section>
    @endsection
