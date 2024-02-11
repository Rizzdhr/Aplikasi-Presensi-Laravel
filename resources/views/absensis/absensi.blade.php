@extends('layouts.main')
@section('judul', 'Absensi | Data Siswa')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Presensi Siswa
                            {{ $resource->hasil_kelas . ' (' . Carbon\Carbon::now('Asia/Jakarta')->format('d F Y') . ')' }}
                        </h1>
                        <br>
                    </div>
                    <div class="col text-right">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('absensis.index') }}">Daftar Kelas</a></li>
                            <li class="breadcrumb-item active">Presensi Siswa</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Siswa {{ $resource->hasil_kelas }}</h3>
                </div>

                <form action="absensi.create" method="POST">
                    <input type="hidden" name="kelas" value="{{ $resource->id_kelas }}">
                    {{ csrf_field() }}
                    <p data-placement="top" data-toggle="tooltip" title="Add">
                        ‎ ‎ ‎ ‎ ‎ ‎

                        <button class="btn btn-success btn-md" type="submit" data-title="Add">Simpan</button>
                    </p>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table id="tabledata" class="table table-striped projects">
                                <thead>
                                    <tr>
                                        <th style="width: 1%">No</th>
                                        <th>NISN</th>
                                        <th>Nama</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($resource->siswa as $index => $res)
                                        <tr>
                                            <input type="hidden" name="siswa[]" value="{{ $res->siswa_id }}">
                                            <td class="text-center">{{ $index + 1 }}</td>

                                            <td>{{ $res->nisn }}</td>
                                            <td>{{ $res->nama }}</td>
                                            <td>
                                                @if (!is_null($resource->absen) && $resource->absen->count() != 0)
                                                    @foreach ($resource->absen as $absen)
                                                        @if ($absen->nisn == $res->nisn && $absen->pivot->tanggal == \Carbon\Carbon::now('Asia/Jakarta')->format('Y-m-d'))
                                                            <p>{{ $absen->pivot->status }}</p>
                                                        @break

                                                    @else
                                                        @if ($loop->last)
                                                            <label class="radio-inline">
                                                                <input id="aktif" type="radio"
                                                                    name="status[{{ $index }}]" value="Hadir"
                                                                    checked>Hadir
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input id="aktif" type="radio"
                                                                    name="status[{{ $index }}]"
                                                                    value="Alpha">Alpha
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input id="aktif" type="radio"
                                                                    name="status[{{ $index }}]"
                                                                    value="Izin">Izin
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input id="aktif" type="radio"
                                                                    name="status[{{ $index }}]"
                                                                    value="Sakit">Sakit
                                                            </label>
                                                        @endif
                                                    @endif
                                                @endforeach
                                            @else
                                                <label class="radio-inline">
                                                    <input id="aktif" type="radio"
                                                        name="status[{{ $index }}]" value="Hadir" checked>Hadir
                                                </label>
                                                <label class="radio-inline">
                                                    <input id="aktif" type="radio"
                                                        name="status[{{ $index }}]" value="Alpha">Alpha
                                                </label>
                                                <label class="radio-inline">
                                                    <input id="aktif" type="radio"
                                                        name="status[{{ $index }}]" value="Izin">Izin
                                                </label>
                                                <label class="radio-inline">
                                                    <input id="aktif" type="radio"
                                                        name="status[{{ $index }}]" value="Sakit">Sakit
                                                </label>
                                            @endif
                                        </td>
                                        {{-- <td>
                                        <input type="text" name="keterangan[{{ $index }}]">
                                    </td> --}}
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
            </form>
        </div>
</div><!--/.row-->
</div>

</div>
</div>

</section>
@endsection
