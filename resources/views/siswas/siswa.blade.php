@extends('layouts.main')
@section('judul', 'Data Siswa')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Data Siswa</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Data Siswa</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                @can('create-data')
                    <div class="card-header">
                        <a href="{{ route('siswas.create') }}" class="btn btn-success"><i class="fas fa-plus"></i> Tambah</a>
                    </div>
                @endcan

                <div class="card-body ">
                    <div class="table-responsive">
                        <table id="tabledata" class="table projects">
                            <thead class="table-dark">
                                <tr>
                                    <th style="width: 1%">
                                        No
                                    </th>
                                    <th style="">
                                        NISN
                                    </th>
                                    <th style="">
                                        Nama
                                    </th>
                                    <th style="">
                                        Kelas
                                    </th>
                                    <th class="text-truncate" style="">
                                        Jenis Kelamin
                                    </th>
                                    @can('edit-data|delete-data')
                                        <th style="">
                                            Action
                                        </th>
                                    @endcan
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($siswas as $siswa)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="text-truncate">{{ $siswa->nisn }}</td>
                                        <td class="text-truncate">{{ $siswa->nama }}</td>
                                        <td class="text-truncate">{{ $siswa->kelas->hasil_kelas }}</td>
                                        {{-- <td>{{ $siswa->jurusan->nama_jurusan }}</td> --}}
                                        <td class="text-truncate">{{ $siswa->jenis_kelamin }}</td>

                                        @can('edit-data|delete-data')
                                            <td class="text-truncate">
                                                <form id="deleteForm{{ $siswa->id }}"
                                                    action="{{ route('siswas.destroy', $siswa->id) }}" method="POST">
                                                    {{-- <a class="btn btn-primary btn-sm"
                                                    href="{{ route('siswas.show', $siswa->id) }}">
                                                    <i class="fas fa-folder">
                                                    </i>
                                                    View
                                                </a> --}}

                                                    <a href="{{ route('siswas.edit', $siswa->id) }}"
                                                        class="btn btn-info btn-sm"><i class="fas fa-pencil-alt">
                                                        </i>
                                                        EDIT
                                                    </a>

                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-sm btn-danger"
                                                        onclick="confirmDelete('{{ $siswa->id }}')">
                                                        <i class="fas fa-trash">
                                                        </i>
                                                        HAPUS</button>
                                                </form>
                                            </td>
                                        @endcan

                                    </tr>
                                @empty
                                    {{-- <div class="alert alert-danger">
                                    Data Siswa belum Tersedia.
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



{{-- <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <h1 class="fw-bold">Data Siswa</h1>
                    <br>
                    <a href="{{ route('students.create') }}" class="btn btn-md btn-success mb-3">TAMBAH SISWA</a>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">NISN</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($students as $student)
                                <tr>
                                    <td>{{ $counter++ }}</td>
                                    <td>{{ $student->nisn }}</td>
                                    <td>{{ $student->nama }}</td>
                                    <td>{{ $student->jenis_kelamin }}</td>

                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                            action="{{ route('students.destroy', $student->id) }}" method="POST">
                                            <a href="{{ route('students.edit', $student->id) }}"
                                                class="btn btn-sm btn-primary">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <div class="alert alert-danger">
                                    Data Siswa belum Tersedia.
                                </div>
                            @endforelse
                        </tbody>
                    </table> --}}
{{-- {{ $students->links() }} --}}
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

</body>

</html> --}}
