@extends('layouts.main')
@section('judul', 'Show Role')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row ">
                    <div class="d-flex col-sm-6 align-items-center">
                        <a href="{{ url()->previous() }}" class="btn btn-dark"><i class="fas fa-arrow-left nav-icon"></i></a>
                        <span class="ml-2"><h1>Show Role</h1></span>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Content Header (Page header) -->
        <section class="content">
            <div class="row ">
                <div class="col-md-6 container">
                    <div class="card card-dark">
                        <div class="card-header">
                            <h3 class="card-title">Role</h3>

                            <div class="card-tools">
                                {{-- <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button> --}}
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="mb-3 row">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-end text-start"><strong>Name:</strong></label>
                                <div class="col-md-6" style="line-height: 35px;">
                                    {{ $role->name }}
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="roles"
                                    class="col-md-4 col-form-label text-md-end text-start"><strong>Permissions:</strong></label>
                                <div class="col-md-6" style="line-height: 35px;">
                                    @if ($role->name == 'Admin')
                                        <span class="badge bg-primary">All</span>
                                    @else
                                        @forelse ($rolePermissions as $permission)
                                            <span class="badge bg-primary">{{ $permission->name }}</span>
                                        @empty
                                        @endforelse
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endsection
