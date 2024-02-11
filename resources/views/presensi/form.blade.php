@extends('layouts.main')

@section('judul', 'Absensi | Data Kelas')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <!-- ... (Bagian header lainnya) ... -->
            </div>
        </section>

        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Presensi Siswa {{ $kelas->nama }} ({{ now('Asia/Jakarta')->format('d F Y') }})</h3>
                </div>

                <form action="{{ route('absensi.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="kelas" value="{{ $kelas->id }}">
                    <div class="card-body p-0">
                        <table class="table table-striped projects">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NISN</th>
                                    <th>Nama</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($siswa as $index => $item)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $item->nisn }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>
                                            <select name="status[{{ $index }}]" class="form-control">
                                                <option value="Hadir" selected>Hadir</option>
                                                <option value="Izin">Izin</option>
                                                <option value="Sakit">Sakit</option>
                                                <option value="Alpha">Alpha</option>
                                            </select>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="panel-footer">
                        <p data-placement="top" data-toggle="tooltip" title="Add" class="pull-right">
                            <button class="btn btn-primary btn-sm" type="submit" data-title="Add">Submit</button>
                        </p>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection
