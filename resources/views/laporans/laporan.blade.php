@extends('layouts.main')
@section('title', 'AN Absensi | Data Kelas')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Laporan Presensi
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
                <form action="/rekap/pribadipdf/" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{ $resource->id_kelas }}">
                    <input type="hidden" name="tanggal_awal">
                    <input type="hidden" name="tanggal_akhir">
                    <div class="table-responsive">
                        <table id="tabledata" class="table table-bordred table-striped">
                            <thead>
                                <tr>
                                    {{-- <th colspan="6"> --}}
                                    <div class="form-group">

                                        <div class='input-group date' id='datetimepicker1'>
                                            <input type='text' id="demo" class="">
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>

                                            <button type="submit" class="btn btn-danger">PDF</button>
                                        </div>
                                        {{-- </div> --}}
                                        {{-- </th> --}}

                                </tr>
                                <tr>
                                    <th width="1%">No</th>
                                    <th width="10">NISN</th>
                                    <th width="10">Nama Siswa</th>
                                    <th width="1%">Hadir</th>
                                    <th width="1%">Alpha</th>
                                    <th width="1%">Izin</th>
                                    <th width="1%">Sakit</th>
                                </tr>
                            </thead>

                            <tbody id="isi">
                                @foreach ($resource->siswa as $index => $res)
                                    <tr>
                                        <td class="text-center">{{ $index + 1 }}</td>
                                        <td>{{ $res->nisn }}</td>
                                        <td>{{ $res->nama }}</td>
                                        <td>{{ count(App\Models\Absensi::where(['siswa_id' => $res->id_siswa, 'status' => 'Hadir'])->get()) }}
                                        </td>
                                        <td>{{ count(App\Models\Absensi::where(['siswa_id' => $res->id_siswa, 'status' => 'Alpha'])->get()) }}
                                        </td>
                                        <td>{{ count(App\Models\Absensi::where(['siswa_id' => $res->id_siswa, 'status' => 'Izin'])->get()) }}
                                        </td>
                                        <td>{{ count(App\Models\Absensi::where(['siswa_id' => $res->id_siswa, 'status' => 'Sakit'])->get()) }}
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </form>
            </div>
    </div>  
@endsection
@section('js')
    <script>
        moment.locale('id');
        $('#demo').daterangepicker({
            "ranges": {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf(
                    'month')]
            },
            "alwaysShowCalendars": true,
            "startDate": moment().format('L'),
            "endDate": moment().format('L')
        }, function(start, end, label) {
            $.ajax({
                type: 'POST',
                data: {
                    id: $('input[name="id"]').val(),
                    tanggal_awal: start.format('YYYY-M-Do'),
                    tanggal_akhir: end.format('YYYY-M-Do'),
                    _method: 'POST',
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                url: '/rekap/',
                success: function(html) {
                    $('#isi').html(html)
                }
            });
            $('input[name="tanggal_awal"]').val(start.format('YYYY-M-Do'));
            $('input[name="tanggal_akhir"]').val(end.format('YYYY-M-Do'));
            console.log(start.format('YYYY-M-Do'));
        });
    </script>
@endsection
