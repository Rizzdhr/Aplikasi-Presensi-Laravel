{{-- @extends('layouts.main')
@section('judul', 'Absensi | Data Kelas')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Absensi</h1>
                        <br>
                    </div>
                    <div class="col text-right">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Absensi</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Absensi</h3>
                </div>

                <form action="/absensi" method="post">
                    <input type="hidden" name="kelas" value="{{ $resource->id_kelas }}">
                    {{ csrf_field() }}
                    <div class="card-body p-0">
                        <table id="" class="table table-striped projects">
                            <thead>
                                <tr>
                                    <th style="width: 1%">No</th>
                                    <th>NISN</th>
                                    <th>Nama</th>
                                    <th>Keterangan</th>
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
                                                                name="status[{{ $index }}]" value="Alfa">Alfa
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
                                                @endif
                                            @endforeach
                                        @else
                                            <label class="radio-inline">
                                                <input id="aktif" type="radio" name="status[{{ $index }}]"
                                                    value="Hadir" checked>Hadir
                                            </label>
                                            <label class="radio-inline">
                                                <input id="aktif" type="radio" name="status[{{ $index }}]"
                                                    value="Alfa">Alfa
                                            </label>
                                            <label class="radio-inline">
                                                <input id="aktif" type="radio" name="status[{{ $index }}]"
                                                    value="Izin">Izin
                                            </label>
                                            <label class="radio-inline">
                                                <input id="aktif" type="radio" name="status[{{ $index }}]"
                                                    value="Sakit">Sakit
                                            </label>
                                        @endif
                                    </td>
                                    <td></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="panel-footer">
                        <p data-placement="top" data-toggle="tooltip" title="Add" class="pull-right"><button
                                class="btn btn-primary btn-sm" type="submit" data-title="Add">Submit</button></p>
                    </div>
            </form>
        </div>
</div><!--/.row-->
</div>

</div>
</div>

</section>
@endsection --}}
