@extends('layouts.main')
@section('judul', 'Data Kelas')


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Data Kelas</h1>
                        <br>
                        <a href="{{ route('kelass.create')}}" class="btn btn-success">Tambah Data</a>
                    </div>
                    <div class="col text-right">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Data Kelas</li>
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
                    <h3 class="card-title">Data Kelas</h3>
                    {{-- <div class="card-tools float-left">
                        <a href="{{ route('kelass.create')}}" class="btn btn-success">Tambah Data</a>
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div> --}}
                </div>
                <div class="card-body p-0">
                    <table  id="tabledata" class="table table-striped projects">
                        <thead>
                            <tr>
                                <th style="width: 1%">
                                    No.
                                </th>
                                <th style="width: 20%">
                                    Kelas
                                </th>
                                <th style="width: 20%">
                                    Jurusan
                                </th>
                                <th>
                                    Walas
                                </th>
                                <th style="width: 20%">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($kelass as $kelas)
                                <tr>
                                    <td>{{ $counter++ }}</td>
                                    <td>{{ $kelas->kelas }}</td>
                                    {{-- <td>
                                        <a href="{{ route('kelass.show', $kelas->id) }}">{{ $kelas->kelas }}</a>
                                    </td> --}}
                                    <td>{{ $kelas->jurusan }}</td>
                                    <td>{{ $kelas->walas }}</td>

                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                            action="{{ route('kelass.destroy', $kelas->id) }}" method="POST">


                                            <a class="btn btn-primary btn-sm" href="#">
                                                <i class="fas fa-folder">
                                                </i>
                                                View
                                            </a>

                                            <a href="{{ route('kelass.edit', $kelas->id) }}"
                                                class="btn btn-info btn-sm"><i class="fas fa-pencil-alt">
                                                </i>
                                                Edit
                                            </a>
                                            @csrf

                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash">
                                                </i>
                                                HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <div class="alert alert-danger">
                                    Data Kelas belum Tersedia.
                                </div>
                            @endforelse
                        </tbody>


                    @endsection



                    {{-- <html lang="en"> --}}

                    {{-- <body style="background: lightgray">
    @section('content')
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <h1 class="fw-bold">Data Kelas</h1>
                        <br>
                        <a href="{{ route('kelass.create') }}" class="btn btn-md btn-success mb-3">TAMBAH KELAS</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Kelas</th>
                                    <th scope="col">Jurusan</th>
                                    <th scope="col">Walas</th>
                                    <th scope="col">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($kelass as $kelas)
                                    <tr>
                                        <td>{{ $counter++ }}</td>
                                        <td>{{ $kelas->kelas }}</td>
                                        {{-- <td>
                                        <a href="{{ route('kelass.show', $kelas->id) }}">{{ $kelas->kelas }}</a>
                                    </td> --}}
                    {{-- <td>{{ $kelas->jurusan }}</td>
                                        <td>{{ $kelas->walas }}</td>

                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                action="{{ route('kelass.destroy', $kelas->id) }}" method="POST">
                                                <a href="{{ route('kelass.edit', $kelas->id) }}"
                                                    class="btn btn-sm btn-primary">EDIT</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <div class="alert alert-danger">
                                        Data Kelas belum Tersedia.
                                    </div>
                                @endforelse
                            </tbody>
                        </table>
                        {{-- {{ $kelass->links() }} --}}
                    {{-- </div>
                </div>
            </div>
        </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

        <script>
            //message with toastr
            @if (session()->has('success'))

                toastr.success('{{ session('success') }}', 'BERHASIL!');
            @elseif (session()->has('error'))

                toastr.error('{{ session('error') }}', 'GAGAL!');
            @endif
        </script>
    @endsection
</body> --}}

                    {{-- </html> --}}
