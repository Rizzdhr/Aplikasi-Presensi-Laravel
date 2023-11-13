@extends('layout.main')
@section('judul', 'Data Kelas')


<html lang="en">
<body style="background: lightgray">
@section('container')
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
                                    <td>{{ $kelas->id }}</td>
                                    <td>{{ $kelas->kelas }}</td>
                                    <td>{{ $kelas->jurusan }}</td>
                                    <td>{{ $kelas->walas }}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('kelass.destroy', $kelas->id) }}" method="POST">
                                            <a href="{{ route('kelass.edit', $kelas->id) }}" class="btn btn-sm btn-primary">EDIT</a>
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
