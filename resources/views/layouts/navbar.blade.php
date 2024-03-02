<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <div class="container-fluid">
            <span class="navbar-text">
                <b>SMK CITRA NEGARA</b>
            </span>
        </div>
        {{-- <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> --}}

    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Akun Dropdown -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fas fa-user"></i>
                {{ Auth::user()->username }}
                {{-- <i class="fas fa-caret-down "></i> --}}
            </a>
            <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                <!-- Opsi Logout -->
                <form id="" action="{{ route('logout') }}" class="dropdown-item" method="GET">
                    @csrf
                    <a href="{{ route('logout') }}" type="button" id="" class="dropdown-item" >
                        <i class="fas fa-sign-out-alt" > </i> Logout
                    </a>
                    {{-- <i type="button" id="logoutButton"  class="fas fa-sign-out-alt"> </i> Logout --}}
                </form>
            </div>
        </li>
    </ul>

</nav>
<!-- /.navbar -->
