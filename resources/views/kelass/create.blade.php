@extends('layout.main')
@section('judul', 'Create Data Kelas')

<body style="background: lightgray">
    @section('container')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="container col-md-5">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('kelass.store') }}" method="POST">

                            @csrf

                            <div class="form-group mb-3">
                                <label for="">Kelas</label>
                                <select type="text" class="form-control @error('kelas') is-invalid @enderror" name="kelas" value="{{ old('kelas') }}" placeholder="Masukkan Jenis Kelamin">
                                    <option value="">-</option>
                                    <option value="x">X</option>
                                    <option value="xi">XI</option>
                                    <option value="xii">XII</option>
                                </select>
                                <!-- error message untuk kelas -->
                                @error('kelas')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="">Jurusan</label>
                                <select type="text" class="form-control @error('jurusan') is-invalid @enderror" name="jurusan" value="{{ old('jurusan') }}" placeholder="Masukkan Jenis Kelamin">
                                    <option value="">-</option>
                                    <option value="RPL">RPL</option>
                                    <option value="TKJ">TKJ</option>
                                    <option value="BDP">BDP</option>
                                    <option value="OTKP">OTKP</option>
                                    <option value="MM">MM</option>
                                </select>
                                <!-- error message untuk jurusan -->
                                @error('jurusan')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Walas</label>
                                <input type="text" class="form-control @error('walas') is-invalid @enderror" name="walas" value="{{ old('walas') }}" placeholder="Masukkan Walas">
                                <!-- error message untuk walas -->
                                @error('walas')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
</body>
</html>
