
    <!-- ===============================================--><!--    Main Content--><!-- ===============================================-->
    
      {{-- <div class="content"> --}}
        <nav class="navbar navbar-expand-md fixed-top" id="navbar" data-navbar-soft-on-scroll="data-navbar-soft-on-scroll">
          <div class="container-fluid px-0">
            <a href="/"><img class="navbar-brand w-75 d-md-none" src="/images/logoFinal.png" alt="logo" /></a>
            <a class="navbar-brand fw-bold d-none d-md-block" href="/">JobHunt</a>
            @if (auth()->check())
            <div class="collapse navbar-collapse justify-content-md-end" id="navbar-content" data-navbar-collapse="data-navbar-collapse">
              <ul class="navbar-nav gap-md-2 gap-lg-3 pt-x1 pb-1 pt-md-0 pb-md-0" data-navbar-nav="data-navbar-nav">
                <li class="nav-item"> <a class="nav-link lh-xl" href="/">Trang chủ</a></li>
                <li class="nav-item"> <a class="nav-link lh-xl" href="/company">Công ty</a></li>
                <li class="nav-item"> <a class="nav-link lh-xl" href="/news">Tin tức</a></li>
                <li class="nav-item" style="margin-top:-40px"> 
                  <a class="nav-link lh-xl" href="/profile">
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
                                <i class="fa fa-user "></i>
                                <p class="mb-0 ">Thông tin cá nhân</p>
                              </a>
                              <hr>
                              <a href="/listCV/{{auth()->user()->USER_ID}}" class="d-flex align-items-center gap-2 dropdown-item">
                                <i class="fa-solid fa-file"></i>
                                <p class="mb-0">Thông tin CV</p>
                              </a>
                              <a href="/doiMatKhau" class="d-flex align-items-center gap-2 dropdown-item">
                                <i class="fa-solid fa-key"></i>
                                <p class="mb-0">Đổi mật khẩu</p>
                              </a>
                              <a href="/quenMatKhau" class="d-flex align-items-center gap-2 dropdown-item">
                                <i class="fa-solid fa-unlock-keyhole"></i>
                                <p class="mb-0 ">Quên mật khẩu</p>
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
                  </a>
                </li>
              </ul>
            </div>
            {{-- <a class="btn btn-primary btn-sm ms-md-x1 mt-lg-0 order-md-1 ms-auto" href="">Chào mừng {{auth()->user()->NAME}} </a>
            <button class="navbar-toggler border-0 pe-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-content" aria-controls="navbar-content" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>             --}}
            
            @else
            <div class="collapse navbar-collapse justify-content-md-end" id="navbar-content" data-navbar-collapse="data-navbar-collapse">
              <ul class="navbar-nav gap-md-2 gap-lg-3 pt-x1 pb-1 pt-md-0 pb-md-0" data-navbar-nav="data-navbar-nav">
                <li class="nav-item"> <a class="nav-link lh-xl" href="/">Trang chủ</a></li>
                <li class="nav-item"> <a class="nav-link lh-xl" href="/company">Công ty</a></li>
                <li class="nav-item"> <a class="nav-link lh-xl" href="/news">Tin tức</a></li>
                <li class="nav-item d-flex"> <a class="nav-link lh-xl" href="/register">Đăng ký</a> <a class="nav-link lh-xl" href="#">/</a> <a class="nav-link lh-xl" href="/login">Đăng nhập</a></li>
              </ul>
            </div>
            
            </button>
            @endif

            
          </div>
        </nav>
        <img src="/images/background.jpg" width="100%" height="400px" alt="">