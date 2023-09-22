@extends('layout.main')
@section('judul', 'Data Siswa')


<html lang="en">
<body style="background: lightgray">
@section('container')
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <h1 class="fw-bold">Data Siswa</h1>
                        <br>
                        <a href="{{ route('students.create') }}" class="btn btn-md btn-success mb-3">TAMBAH SISWA</a>
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">NIS</th>
                                <th scope="col">Nama</th>
                                <th scope="col">No. HP</th>
                                <th scope="col">Email</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              @forelse ($students as $student)
                                <tr>
                                    <td>{{ $student->nis }}</td>
                                    <td>{{ $student->nama }}</td>
                                    <td>{{ $student->no_hp}}</td>
                                    <td>{{ $student->email}}</td>
                                    <td>{{ $student->jenis_kelamin}}</td>

                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('students.destroy', $student->id) }}" method="POST">
                                            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-sm btn-primary">EDIT</a>
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
                          </table>
                          {{ $students->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        //message with toastr
        @if(session()->has('success'))

            toastr.success('{{ session('success') }}', 'BERHASIL!');

        @elseif(session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!');

        @endif
    </script>
@endsection
</body>
</html>
