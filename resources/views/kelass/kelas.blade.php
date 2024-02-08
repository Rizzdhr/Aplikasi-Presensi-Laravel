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
                        {{-- @can('create_data') --}}

                        {{-- @endcan --}}
                    </div>
                    <div class="col text-right">
                        <ol class="breadcrumb float-sm-right ">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
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

                    <a href="{{ route('kelass.create') }}" class="btn btn-success"><i class="fas fa-plus"></i>  Tambah</a>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table id="tabledata" class="display table table-striped projects">
                            <thead>
                                <tr>
                                    <th style="width: 1%">
                                        No
                                    </th>
                                    <th style="">
                                        Kelas
                                    </th>
                                    <th>
                                        Wali Kelas
                                    </th>
                                    <th style="">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($kelass as $kelas)
                                    <tr>
                                        <td>{{ $counter++ }}</td>
                                        <td>{{ $kelas->hasil_kelas }}</td>
                                        {{-- <td>
                                        <a href="{{ route('kelass.show', $kelas->id) }}">{{ $kelas->kelas }}</a>
                                    </td> --}}
                                        {{-- <td>{{ $kelas->jurusan->nama_jurusan }}</td> --}}
                                        <td>{{ $kelas->guru->nama }}</td>

                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                action="{{ route('kelass.destroy', $kelas->id) }}" method="POST">


                                                <a class="btn btn-primary btn-sm"
                                                    href="{{ route('kelass.show', $kelas->id) }}">
                                                    <i class="fas fa-folder">
                                                    </i>
                                                    View
                                                </a>

                                                {{-- @can('edit_data') --}}
                                                <a href="{{ route('kelass.edit', $kelas->id) }}"
                                                    class="btn btn-info btn-sm"><i class="fas fa-pencil-alt">
                                                    </i>
                                                    Edit
                                                </a>
                                                {{-- @endcan --}}

                                                {{-- @can('delete_data') --}}
                                                @csrf

                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="fas fa-trash">
                                                    </i>
                                                    HAPUS</button>

                                                {{-- @endcan --}}
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    {{-- <div class="alert alert-danger">
                                    Data Kelas belum Tersedia.
                                </div> --}}
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>


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
