<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="index3.html" class="nav-link">Home</a>
        </li>
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
                {{ Auth::user()->name }}
                <i class="fas fa-caret-down "></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <!-- Opsi Profil -->
                {{-- <a href="#" class="dropdown-item">
                <i class="fas fa-user-circle"></i> Profil
            </a> --}}
                <div class="dropdown-divider"></div>
                <!-- Opsi Logout -->
                <a href="#" class="dropdown-item">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </li>
    </ul>

</nav>
<!-- /.navbar -->
