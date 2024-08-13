<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>NTD - {{$title}}</title>
  <link rel="shortcut icon" type="image/png" href="/logo.jpg" />
  <link rel="stylesheet" href="/NTD/assets/css/styles.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="/NhaTuyenDung" class="text-nowrap logo-img">
            {{-- <img src="/NTD/assets/images/logos/dark-logo.svg" width="180" alt="" /> --}}
            <h2> #NhaTuyenDung </h2>
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Trang chủ</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/NhaTuyenDung" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Quản lý</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/NhaTuyenDung/listJob" aria-expanded="false">
                <span>
                  <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Bài đăng tuyển dụng</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/NhaTuyenDung/listJobWait" aria-expanded="false">
                <span>
                  <i class="ti ti-alert-circle"></i>
                </span>
                <span class="hide-menu">Bài đăng chờ duyệt</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/NhaTuyenDung/listUV" aria-expanded="false">
                <span>
                  <i class="ti ti-cards"></i>
                </span>
                <span class="hide-menu">Danh sách bài đăng</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/NhaTuyenDung/postJob" aria-expanded="false">
                <span>
                  <i class="ti ti-file-description"></i>
                </span>
                <span class="hide-menu">Đăng tin tuyển dụng</span>
              </a>
            </li>
            
            
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Thêm</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/NhaTuyenDung/downloadForm" aria-expanded="false">
                <span>
                  <i class="ti ti-file-description"></i>
                </span>
                <span class="hide-menu">Đăng tin nhanh</span>
              </a>
            </li>
                    
          </ul>
          
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                <i class="ti ti-bell-ringing"></i>
                <div class="notification bg-primary rounded-circle"></div>
              </a>
            </li>
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
              <li class="nav-item dropdown">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <img src="/uploadAvatar/{{auth()->user()->AVATAR}}" alt="" width="35" height="35" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  <div class="message-body">
                    <a href="/profile" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-user fs-6"></i>
                      <p class="mb-0 fs-3">Thông tin cá nhân</p>
                    </a>
                    <hr>
                    <a href="/doiMatKhau" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="fa-solid fa-key"></i>
                      <p class="mb-0 fs-3">Đổi mật khẩu</p>
                    </a>
                    <a href="/quenMatKhau" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="fa-solid fa-unlock-keyhole"></i>
                      <p class="mb-0 fs-3">Quên mật khẩu</p>
                    </a>
                    <form action="/logout" method="POST">
                      @csrf
                      <button type="submit" class="btn btn-outline-primary mx-3 mt-2 d-block">
                        Đăng xuất
                      </button>
                    </form>
                   
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>


      <!--  Header End -->
      @yield('NTD')
      @yield('postJob')
      @yield('editJob')
      @yield('listJob')
      @yield('profile')
      @yield('editProfile')
      @yield('changePassword')
      @yield('forgotPassword')
      @yield('downloadFormPage')
      @yield('listUV')
      @yield('listCV')
      </div>
    </div>
  </div>
  

  <script src="/NTD/assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="/NTD/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="/NTD/assets/js/sidebarmenu.js"></script>
  <script src="/NTD/assets/js/app.min.js"></script>
  <script src="/NTD/assets/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="/NTD/assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="/NTD/assets/js/dashboard.js"></script>
</body>

</html>