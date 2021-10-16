<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>SI-ALBERT - UPTD Alat Berat PUPR Kota Pontianak</title>
    <!-- Favicon -->
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="assets/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
    <!-- Page plugins -->
    <!-- Argon CSS -->
    <link rel="stylesheet" href="assets/css/argon.css?v=1.2.0" type="text/css">
    <link rel="shortcut icon" type="image/x-icon" href="{{{ asset('img/logo_pupr.jpeg') }}}">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="assets/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
    <!-- Argon CSS -->
    <link rel="stylesheet" href="assets/css/argon.css?v=1.2.0" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="assets/css/datatable.css">

<!-- jquery -->
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
</head>

<body>
  <!-- Sidenav -->
    <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
        <div class="scrollbar-inner">
        <!-- Brand -->
            <div class="sidenav-header  align-items-center">
                <a class="navbar-brand" href="javascript:void(0)">
                <img src="img/logo.svg" class="navbar-brand-img" alt="...">
                </a>
            </div>
            <div class="navbar-inner">
                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                    <a class="nav-link {{ Request::path() === 'dashboard' ? 'active' : '' }}" href="dashboard">
                        <i class="ni ni-tv-2 text-primary"></i>
                        <span class="nav-link-text">Dashboard</span>
                    </a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link {{ Request::path() === '/peraturan' ? 'active' : '' }}" href="examples/icons.html">
                        <i class="ni ni-bullet-list-67 text-red"></i>
                        <span class="nav-link-text">Peraturan</span>
                    </a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link {{ Request::path() === 'alat_berat' ? 'active' : '' }}" href="alat_berat">
                        <i class="fa fa-truck text-blue"></i>
                        <span class="nav-link-text">Alat Berat</span>
                    </a>
                    </li>
                </ul>
                <!-- Divider -->
                <hr class="my-3">
                <!-- Heading -->
                <!-- Navigation -->
                <ul class="navbar-nav mb-md-3">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ni ni-single-02 text-yellow"></i>
                            <span class="nav-link-text">Penyewaan</span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">Penyewa Umum</a>
                            <a class="dropdown-item" href="#">Penyewa PUPR</a>
                            <a class="dropdown-item" href="#">Kegiatan Masyarakat</a>
                        </div>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="examples/map.html">
                        <i class="fa fa-truck text-blue"></i>
                        <span class="nav-link-text">Refund</span>
                    </a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="examples/map.html">
                        <img src="assets/img/icons/common/penyewaan.png" alt="">
                        <span class="nav-link-text" style="white-space:pre">Reschedule</span>
                    </a>
                    </li>
                </ul>
                </div>
            </div>
        </div>
    </nav>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav align-items-center  ml-md-auto ">
                    <li class="nav-item d-xl-none">
                    <!-- Sidenav toggler -->
                        <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin"
                            data-target="#sidenav-main">
                            <div class="sidenav-toggler-inner">
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item d-sm-none">
                        <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                            <i class="ni ni-zoom-split-in"></i>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <i class="ni ni-bell-55 text-blue"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-xl  dropdown-menu-right  py-0 overflow-hidden">
                            <!-- Dropdown header -->
                            <div class="px-3 py-3">
                            <h6 class="text-sm text-muted m-0">You have <strong class="text-primary">13</strong> notifications.
                            </h6>
                            </div>
                            <!-- List group -->
                            <div class="list-group list-group-flush">
                            <a href="#!" class="list-group-item list-group-item-action">
                                <div class="row align-items-center">
                                <div class="col-auto">
                                    <!-- Avatar -->
                                    <img alt="Image placeholder" src="assets/img/theme/team-1.jpg" class="avatar rounded-circle">
                                </div>
                                <div class="col ml--2">
                                    <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h4 class="mb-0 text-sm">John Snow</h4>
                                    </div>
                                    <div class="text-right text-muted">
                                        <small>2 hrs ago</small>
                                    </div>
                                    </div>
                                    <p class="text-sm mb-0">Let's meet at Starbucks at 11:30. Wdyt?</p>
                                </div>
                                </div>
                            </a>
                            <a href="#!" class="list-group-item list-group-item-action">
                                <div class="row align-items-center">
                                <div class="col-auto">
                                    <!-- Avatar -->
                                    <img alt="Image placeholder" src="assets/img/theme/team-2.jpg" class="avatar rounded-circle">
                                </div>
                                <div class="col ml--2">
                                    <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h4 class="mb-0 text-sm">John Snow</h4>
                                    </div>
                                    <div class="text-right text-muted">
                                        <small>3 hrs ago</small>
                                    </div>
                                    </div>
                                    <p class="text-sm mb-0">A new issue has been reported for Argon.</p>
                                </div>
                                </div>
                            </a>
                            <a href="#!" class="list-group-item list-group-item-action">
                                <div class="row align-items-center">
                                <div class="col-auto">
                                    <!-- Avatar -->
                                    <img alt="Image placeholder" src="assets/img/theme/team-3.jpg" class="avatar rounded-circle">
                                </div>
                                <div class="col ml--2">
                                    <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h4 class="mb-0 text-sm">John Snow</h4>
                                    </div>
                                    <div class="text-right text-muted">
                                        <small>5 hrs ago</small>
                                    </div>
                                    </div>
                                    <p class="text-sm mb-0">Your posts have been liked a lot.</p>
                                </div>
                                </div>
                            </a>
                            <a href="#!" class="list-group-item list-group-item-action">
                                <div class="row align-items-center">
                                <div class="col-auto">
                                    <!-- Avatar -->
                                    <img alt="Image placeholder" src="assets/img/theme/team-4.jpg" class="avatar rounded-circle">
                                </div>
                                <div class="col ml--2">
                                    <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h4 class="mb-0 text-sm">John Snow</h4>
                                    </div>
                                    <div class="text-right text-muted">
                                        <small>2 hrs ago</small>
                                    </div>
                                    </div>
                                    <p class="text-sm mb-0">Let's meet at Starbucks at 11:30. Wdyt?</p>
                                </div>
                                </div>
                            </a>
                            <a href="#!" class="list-group-item list-group-item-action">
                                <div class="row align-items-center">
                                <div class="col-auto">
                                    <!-- Avatar -->
                                    <img alt="Image placeholder" src="assets/img/theme/team-5.jpg" class="avatar rounded-circle">
                                </div>
                                <div class="col ml--2">
                                    <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h4 class="mb-0 text-sm">John Snow</h4>
                                    </div>
                                    <div class="text-right text-muted">
                                        <small>3 hrs ago</small>
                                    </div>
                                    </div>
                                    <p class="text-sm mb-0">A new issue has been reported for Argon.</p>
                                </div>
                                </div>
                            </a>
                            </div>
                            <!-- View all -->
                            <a href="#!" class="dropdown-item text-center text-primary font-weight-bold py-3">View all</a>
                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
                    <li class="nav-item dropdown">
                        <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="media align-items-center">
                                <span class="avatar avatar-sm rounded-circle">
                                <img src="img/logo_pupr.jpeg" class="user-image" alt="User Image">
                                </span>
                                <div class="media-body  ml-2  d-none d-lg-block">
                                    <span style="font-family: 'Josefin Sans', sans-serif !important; color:blue; background-size: cover; width:100%; height:100%" class="hidden-xs">Dita Adetia</span>
                                    <i class="ni ni-bold-down text-blue"></i>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu  dropdown-menu-right ">
                            <div class="dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Welcome!</h6>
                            </div>
                            <a href="edit_profil?id_pegawai" class="dropdown-item">
                                <i class="ni ni-single-02"></i>
                                <span>My profile</span>
                            </a>
                            <a href="data_pegawai" class="dropdown-item">
                                <i class="fa fa-users"></i>
                                <span>Daftar Pegawai</span>
                            </a>
                            <a href="ubah_password?id_pegawai" class="dropdown-item">
                                <i class="fa fa-key"></i>
                                <span>Ubah Password</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="logout" class="dropdown-item">
                                <i class="ni ni-user-run"></i>
                                <span>Logout</span>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Header -->
    <div class="header bg-primary pb-6" style="border-bottom-right-radius: 20px; border-bottom-left-radius: 20px;">
      <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                  <h6 class="h2 text-white d-inline-block mb-0">Default</h6>
                  <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                    <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                      <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                      <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Default</li>
                    </ol>
                  </nav>
                </div>
              </div>
          <!-- Card stats -->
            <div class="row">
                <div class="col-xl-3 col-md-6">
                <div class="card card-stats">
                    <!-- Card body -->
                    <div class="card-body">
                    <div class="row">
                        <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Total traffic</h5>
                        <span class="h2 font-weight-bold mb-0">350,897</span>
                        </div>
                        <div class="col-auto">
                        <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                            <i class="ni ni-active-40"></i>
                        </div>
                        </div>
                    </div>
                    <p class="mt-3 mb-0 text-sm">
                        <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                        <span class="text-nowrap">Since last month</span>
                    </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card card-stats">
                    <!-- Card body -->
                    <div class="card-body">
                    <div class="row">
                        <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">New users</h5>
                        <span class="h2 font-weight-bold mb-0">2,356</span>
                        </div>
                        <div class="col-auto">
                        <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                            <i class="ni ni-chart-pie-35"></i>
                        </div>
                        </div>
                    </div>
                    <p class="mt-3 mb-0 text-sm">
                        <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                        <span class="text-nowrap">Since last month</span>
                    </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card card-stats">
                    <!-- Card body -->
                    <div class="card-body">
                    <div class="row">
                        <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Sales</h5>
                        <span class="h2 font-weight-bold mb-0">924</span>
                        </div>
                        <div class="col-auto">
                        <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                            <i class="ni ni-money-coins"></i>
                        </div>
                        </div>
                    </div>
                    <p class="mt-3 mb-0 text-sm">
                        <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                        <span class="text-nowrap">Since last month</span>
                    </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card card-stats">
                    <!-- Card body -->
                    <div class="card-body">
                    <div class="row">
                        <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Performance</h5>
                        <span class="h2 font-weight-bold mb-0">49,65%</span>
                        </div>
                        <div class="col-auto">
                        <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                            <i class="ni ni-chart-bar-32"></i>
                        </div>
                        </div>
                    </div>
                    <p class="mt-3 mb-0 text-sm">
                        <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                        <span class="text-nowrap">Since last month</span>
                    </p>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    @yield('isicard')
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Optional JS -->
  <script src="assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="assets/js/argon.js?v=1.2.0"></script>
  @include('sweetalert::alert')
</body>

</html>
