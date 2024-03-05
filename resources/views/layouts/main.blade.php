<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('judul')</title>
    <link rel="icon" type="image/png" href="{{ asset('image/logo_cn-removebg-preview.png') }}">

    {{-- responsive --}}
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    {{-- bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    {{-- datatables --}}
    <link href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/autofill/2.6.0/css/autoFill.bootstrap5.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/colreorder/1.7.0/css/colReorder.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/fixedcolumns/4.3.0/css/fixedColumns.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/fixedheader/3.4.0/css/fixedHeader.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/scroller/2.3.0/css/scroller.bootstrap5.min.css" rel="stylesheet">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
</head>

<body class="hold-transition light-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        {{-- <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="{{ asset('image/logo_cn-removebg-preview.png') }}" alt="AdminLTELogo"
                height="95" width="110">
        </div> --}}

        @include('layouts.navbar')

        @include('layouts.sidebar')

        @include('sweetalert::alert')

        <div class="mt-4">
            @yield('content')
        </div>

        {{-- <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.2.0
            </div>
        </footer> --}}


        <!-- REQUIRED SCRIPTS -->

        {{-- datatables --}}
        <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap5.min.js"></script>
        <script src="https://cdn.datatables.net/autofill/2.6.0/js/dataTables.autoFill.min.js"></script>
        <script src="https://cdn.datatables.net/autofill/2.6.0/js/autoFill.bootstrap5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.bootstrap5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.colVis.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
        <script src="https://cdn.datatables.net/colreorder/1.7.0/js/dataTables.colReorder.min.js"></script>
        <script src="https://cdn.datatables.net/fixedcolumns/4.3.0/js/dataTables.fixedColumns.min.js"></script>
        <script src="https://cdn.datatables.net/fixedheader/3.4.0/js/dataTables.fixedHeader.min.js"></script>
        {{-- <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script> --}}
        {{-- <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.js"></script> --}}
        {{-- <script src="https://cdn.datatables.net/scroller/2.3.0/js/dataTables.scroller.min.js"></script> --}}
        <script>
            let table = new DataTable('#tabledata');
        </script>
        <script>
            $('#tabledata2').DataTable({
                responsive: true,
                lengthChange: false,
                searching: true,
                paging: false,
                info: false,
                ordering: false,
                dom: 'Bfrtip',
                language: {
                    emptyTable: "Data belum ada"
                },
                buttons: [
                    // {
                    //     extend: 'copy',
                    //     className: 'btn btn-secondary mr-1'
                    // },
                    {
                        extend: 'excelHtml5',
                        className: 'btn btn-success mr-1',
                        text: '<i class="fas fa-print"></i> Cetak', // Set your custom button text here
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7],
                            modifier: {
                                selected: true
                            }
                        },

                    },
                    // {
                    //     extend: 'print',
                    //     className: 'btn btn-info mr-1',
                    //     exportOptions: {
                    //         columns: [0, 1, 2, 3, 4, 5, 6, 7],
                    //     }
                    // },
                    // {
                    //     extend: 'pdf',
                    //     className: 'btn btn-danger',
                    //     exportOptions: {
                    //         columns: [0, 1, 2, 3, 4, 5, 6, 7],
                    //     }
                    // }
                ]
            });
        </script>

        {{-- sweetalert --}}
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        @if ($message = Session::get('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: '{{ $message }}',
                    // text: '{{ $message }}',
                })
            </script>
        @endif

        @if ($message = Session::get('failed'))
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: '{{ $message }}',
                })
            </script>
        @endif

        <script>
            function confirmDelete(id) {
                Swal.fire({
                    title: "Anda Yakin?",
                    text: "Anda tidak akan dapat mengembalikan ini!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya, Hapus!",
                    cancelButtonText: "Batal"
                }).then((result) => {
                    if (result.isConfirmed) {
                        // If the user confirms, submit the delete form
                        document.getElementById('deleteForm' + id).submit();
                    }
                });
            }
        </script>

        <script>
            // Add a click event listener to the logout button
            document.getElementById('logoutButton').addEventListener('click', function() {
                // Show SweetAlert confirmation dialog
                Swal.fire({
                    title: "Kamu yakin ingin log out?",
                    // text: "You will be logged out of your account.",
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya, log out"
                }).then((result) => {
                    // If the user clicks the confirm button
                    if (result.isConfirmed) {
                        // Submit the logout form
                        document.getElementById('logoutForm').submit();
                    }
                });
            });
        </script>

        {{-- <script>
            // Add a click event listener to the logout button
            document.getElementById('logoutButton2').addEventListener('click', function() {
                // Show SweetAlert confirmation dialog
                Swal.fire({
                    title: "Kamu yakin ingin log out?",
                    // text: "You will be logged out of your account.",
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya, log out"
                }).then((result) => {
                    // If the user clicks the confirm button
                    if (result.isConfirmed) {
                        // Submit the logout form
                        document.getElementById('logoutForm2').submit();
                    }
                });
            });
        </script> --}}

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var sidebar = document.querySelector('.main-sidebar');

                sidebar.addEventListener('transitionend', function(event) {
                    // Cek apakah elemen yang mengalami transition adalah main-sidebar
                    if (event.target === sidebar) {
                        // Cek apakah sidebar sedang ditutup (width-nya berkurang)
                        var isSidebarClosed = sidebar.offsetWidth <
                            250; // Ganti dengan lebar sidebar yang diinginkan

                        // Dapatkan elemen tombol logout
                        var logoutButtonContainer = document.getElementById('logoutButtonContainer');

                        // Sembunyikan atau tampilkan tombol logout berdasarkan kondisi sidebar
                        logoutButtonContainer.style.display = isSidebarClosed ? 'none' : 'block';
                    }
                });
            });
        </script>


        {{-- import --}}
        {{-- <script>
            document.getElementById('importButton').addEventListener('click', function() {
                // Menyembunyikan tombol untuk sementara
                this.style.display = 'none';

                // Mengirim formulir secara otomatis
                document.getElementById('importForm').submit();

                // Menampilkan tombol kembali setelah pengiriman formulir
                this.style.display = 'block';
            });
        </script> --}}

        {{-- bootstrap 5 --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
        <!-- jQuery -->
        <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
            $.widget.bridge('uibutton', $.ui.button)
        </script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- ChartJS -->
        <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
        <!-- jQuery Knob Chart -->
        <script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
        <!-- daterangepicker -->
        <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
        <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
        <!-- Summernote -->
        <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
        <!-- overlayScrollbars -->
        <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('dist/js/adminlte.js') }}"></script>
        <!-- AdminLTE for demo purposes -->
        {{-- <script src="{{ asset('dist/js/demo.js') }}"></script> --}}
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>
</body>

</html>
