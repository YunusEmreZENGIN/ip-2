<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>{{ config('app.name') }}</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <link rel="icon" href="{{ asset('admintemp/assets/img/kaiadmin/favicon.ico') }}" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/v/bs5/jq-3.7.0/jszip-3.10.1/dt-2.2.2/af-2.7.0/b-3.2.2/b-colvis-3.2.2/b-html5-3.2.2/b-print-3.2.2/r-3.0.4/sc-2.4.3/sl-3.0.0/datatables.min.css" rel="stylesheet" integrity="sha384-ltBZZBWR54X0o4W/RTXxED4NoRFW1V/drGl8QE86ZyQiRrOu2lMXp+1WAyJX5fMQ" crossorigin="anonymous">

    <!-- Fonts and icons -->
    <script src="{{ asset('admintemp/assets/js/plugin/webfont/webfont.min.js') }}"></script>
    <script>
        WebFont.load({
            google: {
                families: ["Public Sans:300,400,500,600,700"]
            },
            custom: {
                families: [
                    "Font Awesome 5 Solid",
                    "Font Awesome 5 Regular",
                    "Font Awesome 5 Brands",
                    "simple-line-icons",
                ],
                urls: ["assets/css/fonts.min.css"],
            },
            active: function() {
                sessionStorage.fonts = true;
            },
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('admintemp/assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admintemp/assets/css/plugins.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admintemp/assets/css/kaiadmin.min.css') }}" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="{{ asset('admintemp/assets/css/demo.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.5/dist/sweetalert2.min.css" rel="stylesheet">
    @stack('css')

</head>

<body>
    <div class="wrapper" id="app">
            <!-- Sidebar -->
     <div class="sidebar" data-background-color="dark">
        <div class="sidebar-logo">
          <!-- Logo Header -->
          <div class="logo-header" data-background-color="dark">
            <a href="index.html" class="logo">
              <img
                src="{{asset('admintemp/assets/img/kaiadmin/logo_light.svg')}}"
                alt="navbar brand"
                class="navbar-brand"
                height="20"
              />
            </a>
            <div class="nav-toggle">
              <button class="btn btn-toggle toggle-sidebar">
                <i class="gg-menu-right"></i>
              </button>
              <button class="btn btn-toggle sidenav-toggler">
                <i class="gg-menu-left"></i>
              </button>
            </div>
            <button class="topbar-toggler more">
              <i class="gg-more-vertical-alt"></i>
            </button>
          </div>
          <!-- End Logo Header -->
        </div>
        <div class="sidebar-wrapper scrollbar scrollbar-inner">
          <div class="sidebar-content">
            <ul class="nav nav-secondary">
              <li class="nav-item ">
                <a
                  data-bs-toggle="collapse"
                  href="#dashboard"
                  class="collapsed"
                  aria-expanded="false"
                >

                  <i class="fas fa-home"></i>
                  <p>Dashboard</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="dashboard">
                  <ul class="nav nav-collapse">
                    <li>
                      <a href="../demo1/index.html">
                        <span class="sub-item">Dashboard 1</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-section">
                <span class="sidebar-mini-icon">
                  <i class="fa fa-ellipsis-h"></i>
                </span>
                <h4 class="text-section">Components</h4>
              </li>
              <ul class="nav nav-treview">
                <li class="nav-item">
                  <a href="{{route('CardType')}}" class="nav-link">
                    <i class="fa-regular fa-circle"></i>
                    <p>CardType</p>
                  </a>

                </li>
                <li class="nav-item">
                  <a href="{{route('layouts.adetraporu')}}" class="nav-link">
                    <i class="fa-regular fa-circle"></i>
                    <p>Adet Raporu</p>
                  </a>

                </li>
                
                <li class="nav-item">
                  <a href="{{ route('layouts.PersonelKayit')}}" class="nav-link">
                    <i class="fa-regular fa-circle"></i>
                    <p>Personel Kayit</p>
                  </a>

                </li>
                 <li class="nav-item">
                  <a href="{{ route('model.create')}}" class="nav-link">
                    <i class="fa-regular fa-circle"></i>
                    <p>Model Tanımlama</p>
                  </a>

                </li>
                <li class="nav-item">
                  <a href="{{ route('personel.liste')}}" class="nav-link">
                    <i class="fa-regular fa-circle"></i>
                    <p>Personel Liste</p>
                  </a>

                </li>
              </ul>

            </ul>
          </div>
        </div>
      </div>
      <!-- End Sidebar -->

        <div class="main-panel">
            <div class="main-header">
                <div class="main-header-logo">
                    <!-- Logo Header -->
                    <div class="logo-header" data-background-color="dark">
                        <a href="index.html" class="logo">
                            <img src="{{ asset('admintemp/assets/img/kaiadmin/logo_light.svg') }}" alt="navbar brand"
                                class="navbar-brand" height="20" />
                        </a>
                        <div class="nav-toggle">
                            <button class="btn btn-toggle toggle-sidebar">
                                <i class="gg-menu-right"></i>
                            </button>
                            <button class="btn btn-toggle sidenav-toggler">
                                <i class="gg-menu-left"></i>
                            </button>
                        </div>
                        <button class="topbar-toggler more">
                            <i class="gg-more-vertical-alt"></i>
                        </button>
                    </div>
                    <!-- End Logo Header -->
                </div>
                <!-- Navbar Header -->
                <nav
class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom"
>
<div class="container-fluid">
  <nav
    class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex"
  >
    <div class="input-group">
     
  </nav>

  <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
    <li
      class="nav-item topbar-icon dropdown hidden-caret d-flex d-lg-none"
    >
      <a
        class="nav-link dropdown-toggle"
        data-bs-toggle="dropdown"
        href="#"
        role="button"
        aria-expanded="false"
        aria-haspopup="true"
      >
        <i class="fa fa-search"></i>
      </a>
      <ul class="dropdown-menu dropdown-search animated fadeIn">
        <form class="navbar-left navbar-form nav-search">
          <div class="input-group">
            <input
              type="text"
              placeholder="Search ..."
              class="form-control"
            />
          </div>
        </form>
      </ul>
    </li>
    
    
    

    <li class="nav-item topbar-user dropdown hidden-caret">
      <a
        class="dropdown-toggle profile-pic"
        data-bs-toggle="dropdown"
        href="#"
        aria-expanded="false"
      >
        <div class="avatar-sm">
          <img
            src="{{ asset('storage/Ben.jpg') }}"
            alt="..."
            class="avatar-img rounded-circle"
          />
        </div>
        <span class="profile-username">
          <span class="op-7">Hi,</span>
          <span class="fw-bold">Yunus Emre</span>
        </span>
      </a>
      <ul class="dropdown-menu dropdown-user animated fadeIn">
        <div class="dropdown-user-scroll scrollbar-outer">
          <li>
            <div class="user-box">
              <div class="avatar-lg">
                <img
                  src="assets/img/profile.jpg"
                  alt="image profile"
                  class="avatar-img rounded"
                />
              </div>
              <div class="u-text">
                <h4>Hizrian</h4>
                <p class="text-muted">hello@example.com</p>
                <a
                  href="profile.html"
                  class="btn btn-xs btn-secondary btn-sm"
                  >View Profile</a
                >
              </div>
            </div>
          </li>
          <li>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">My Profile</a>
            <a class="dropdown-item" href="#">My Balance</a>
            <a class="dropdown-item" href="#">Inbox</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Account Setting</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Logout</a>
          </li>
        </div>
      </ul>
    </li>
  </ul>
</div>
</nav>
                <!-- End Navbar -->

            </div>

            @yield('main2')

        </div>

        <!-- Custom template | don't include it in your project! -->
        <div class="custom-template">
            <div class="title">Settings</div>
            <div class="custom-content">
                <div class="switcher">
                    <div class="switch-block">
                        <h4>Logo Header</h4>
                        <div class="btnSwitch">
                            <button type="button" class="selected changeLogoHeaderColor" data-color="dark"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="blue"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="purple"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="light-blue"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="green"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="orange"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="red"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="white"></button>
                            <br />
                            <button type="button" class="changeLogoHeaderColor" data-color="dark2"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="blue2"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="purple2"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="light-blue2"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="green2"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="orange2"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="red2"></button>
                        </div>
                    </div>
                    <div class="switch-block">
                        <h4>Navbar Header</h4>
                        <div class="btnSwitch">
                            <button type="button" class="changeTopBarColor" data-color="dark"></button>
                            <button type="button" class="changeTopBarColor" data-color="blue"></button>
                            <button type="button" class="changeTopBarColor" data-color="purple"></button>
                            <button type="button" class="changeTopBarColor" data-color="light-blue"></button>
                            <button type="button" class="changeTopBarColor" data-color="green"></button>
                            <button type="button" class="changeTopBarColor" data-color="orange"></button>
                            <button type="button" class="changeTopBarColor" data-color="red"></button>
                            <button type="button" class="selected changeTopBarColor" data-color="white"></button>
                            <br />
                            <button type="button" class="changeTopBarColor" data-color="dark2"></button>
                            <button type="button" class="changeTopBarColor" data-color="blue2"></button>
                            <button type="button" class="changeTopBarColor" data-color="purple2"></button>
                            <button type="button" class="changeTopBarColor" data-color="light-blue2"></button>
                            <button type="button" class="changeTopBarColor" data-color="green2"></button>
                            <button type="button" class="changeTopBarColor" data-color="orange2"></button>
                            <button type="button" class="changeTopBarColor" data-color="red2"></button>
                        </div>
                    </div>
                    <div class="switch-block">
                        <h4>Sidebar</h4>
                        <div class="btnSwitch">
                            <button type="button" class="changeSideBarColor" data-color="white"></button>
                            <button type="button" class="selected changeSideBarColor" data-color="dark"></button>
                            <button type="button" class="changeSideBarColor" data-color="dark2"></button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- End Custom template -->
    </div>
    <script src="{{asset('js/app.js')}}" ></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <!--   Core JS Files   -->
      <script src="{{asset('admintemp/assets/js/core/jquery-3.7.1.min.js')}}"></script>
      <script src="{{asset('admintemp/assets/js/core/popper.min.js')}}"></script>
      <script src="{{asset('admintemp/assets/js/core/bootstrap.min.js')}}"></script>

      <!-- jQuery Scrollbar -->
      <script src="{{asset('admintemp/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>

      <!-- Chart JS -->
      <script src="{{asset('admintemp/assets/js/plugin/chart.js/chart.min.js')}}"></script>

      <!-- jQuery Sparkline -->
      <script src="{{asset('admintemp/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js')}}"></script>

      <!-- Chart Circle -->
      <script src="{{asset('admintemp/assets/js/plugin/chart-circle/circles.min.js')}}"></script>

      <!-- Datatables -->
      <script src="{{asset('admintemp/assets/js/plugin/datatables/datatables.min.js')}}"></script>

      <!-- Bootstrap Notify -->
      <script src="{{asset('admintemp/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js')}}"></script>

      <!-- jQuery Vector Maps -->
      <script src="{{asset('admintemp/assets/js/plugin/jsvectormap/jsvectormap.min.js')}}"></script>
      <script src="{{asset('admintemp/assets/js/plugin/jsvectormap/world.js')}}"></script>

      <!-- Sweet Alert -->
      <script src="{{asset('admintemp/assets/js/plugin/sweetalert/sweetalert.min.js')}}"></script>

      <!-- Kaiadmin JS -->
      <script src="{{asset('admintemp/assets/js/kaiadmin.min.js')}}"></script>

      <!-- Kaiadmin DEMO methods, don't include it in your project! -->
      
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js" integrity="sha384-VFQrHzqBh5qiJIU0uGU5CIW3+OWpdGGJM9LBnGbuIH2mkICcFZ7lPd/AAtI7SNf7" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js" integrity="sha384-/RlQG9uf0M2vcTw3CX7fbqgbj/h8wKxw7C3zu9/GxcBPRKOEcESxaxufwRXqzq6n" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/jszip-3.10.1/dt-2.2.2/af-2.7.0/b-3.2.2/b-colvis-3.2.2/b-html5-3.2.2/b-print-3.2.2/r-3.0.4/sc-2.4.3/sl-3.0.0/datatables.min.js" integrity="sha384-7gz7ymZtmtp0k479ytyHniY3lWHTtowwJW9FJDfIVHEMtzcvjcAr939f10YtFt4i" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  
      @stack('scripts')
</body>

</html>
