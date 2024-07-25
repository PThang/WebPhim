{{-- ĐÂY LÀ KHUNG SƯỜN GIAO DIỆN CỦA LANDING PAGE --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width,initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
        <meta name="revisit-after" content="1 days" />
        <meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' />
        {{-- <meta name="theme-color" content="#234556"> --}}
        <meta name="theme-color" content="#000000">
        {{-- <meta http-equiv="Content-Language" content="vi" />
        <meta content="VN" name="geo.region" />
        <meta name="DC.language" scheme="utf-8" content="vi" />
        <meta name="language" content="Việt Nam"> --}}
        <meta name="description" content="Web phim" />
        <meta property="og:locale" content="vi_VN" />
        <meta property="og:title" content="Web phim" />
        <meta property="og:description" content="Web phim" />
        <meta property="og:url" content="" />
        <meta property="og:site_name" content="Web phim" />
        <meta property="og:image" content="" />
        <meta property="og:image:width" content="300" />
        <meta property="og:image:height" content="55" />
        <title>Xem phim tại Web phim</title>
        {{-- TOKEN --}}
        <meta name="csrf-token" content="{{csrf_token()}}"/>
        <!--Logo nhỏ ở thanh tiêu đề-->
        <link rel="shortcut icon" href={{ asset('imgs/logo.png') }} type="image/x-icon" />
        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <script src="https://kit.fontawesome.com/9eb8b4698c.js" crossorigin="anonymous"></script>
        <!-- Thư viện FontAwesome Animation -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome-animation/0.3.0/font-awesome-animation.min.css">
        <link rel="canonical" href="">
        <link rel="next" href="" />
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel='dns-prefetch' href='//s.w.org' />
        <link rel='stylesheet' id='bootstrap-css' href='{{asset('css/bootstrap.min.css?ver=5.7.2')}}' media='all' />
        <link rel='stylesheet' id='style-css' href='{{asset('css/style.css?ver=5.7.2')}}' media='all' />
        <link rel='stylesheet' id='wp-block-library-css' href='{{asset('css/style.min.css?ver=5.7.2')}}' media='all' />
        <script type='text/javascript' src='{{asset('js/jquery.min.js?ver=5.7.2')}}' id='halim-jquery-js'></script>
        <style type="text/css" id="wp-custom-css">
         .textwidget p a img {
         width: 100%;
         }
      </style>
        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
            html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--tw-bg-opacity: 1;background-color:rgb(255 255 255 / var(--tw-bg-opacity))}.bg-gray-100{--tw-bg-opacity: 1;background-color:rgb(243 244 246 / var(--tw-bg-opacity))}.border-gray-200{--tw-border-opacity: 1;border-color:rgb(229 231 235 / var(--tw-border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{--tw-shadow: 0 1px 3px 0 rgb(0 0 0 / .1), 0 1px 2px -1px rgb(0 0 0 / .1);--tw-shadow-colored: 0 1px 3px 0 var(--tw-shadow-color), 0 1px 2px -1px var(--tw-shadow-color);box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000),var(--tw-ring-shadow, 0 0 #0000),var(--tw-shadow)}.text-center{text-align:center}.text-gray-200{--tw-text-opacity: 1;color:rgb(229 231 235 / var(--tw-text-opacity))}.text-gray-300{--tw-text-opacity: 1;color:rgb(209 213 219 / var(--tw-text-opacity))}.text-gray-400{--tw-text-opacity: 1;color:rgb(156 163 175 / var(--tw-text-opacity))}.text-gray-500{--tw-text-opacity: 1;color:rgb(107 114 128 / var(--tw-text-opacity))}.text-gray-600{--tw-text-opacity: 1;color:rgb(75 85 99 / var(--tw-text-opacity))}.text-gray-700{--tw-text-opacity: 1;color:rgb(55 65 81 / var(--tw-text-opacity))}.text-gray-900{--tw-text-opacity: 1;color:rgb(17 24 39 / var(--tw-text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--tw-bg-opacity: 1;background-color:rgb(31 41 55 / var(--tw-bg-opacity))}.dark\:bg-gray-900{--tw-bg-opacity: 1;background-color:rgb(17 24 39 / var(--tw-bg-opacity))}.dark\:border-gray-700{--tw-border-opacity: 1;border-color:rgb(55 65 81 / var(--tw-border-opacity))}.dark\:text-white{--tw-text-opacity: 1;color:rgb(255 255 255 / var(--tw-text-opacity))}.dark\:text-gray-400{--tw-text-opacity: 1;color:rgb(156 163 175 / var(--tw-text-opacity))}.dark\:text-gray-500{--tw-text-opacity: 1;color:rgb(107 114 128 / var(--tw-text-opacity))}}
        </style>
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
            span.login-text {
               display: none;
            }

            span:hover .login-text {
               display: inline;
            }
        </style>
        <style>
         .bookmark-dropdown {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background-color: #fff;
            border: 1px solid #ccc;
            padding: 10px;
         }

         .bookmark-toggle-btn:focus + .bookmark-dropdown,
         .bookmark-dropdown:focus-within {
            display: block;
         }

         .bookmark-items {
            list-style: none;
            padding: 0;
            margin: 0;
         }

         .bookmark-item {
            padding: 5px 0;
         }
        </style>
        <!--LOGO-->
        <style>
        #header .site-title
         {background: url("{{ asset('imgs/logo.png') }}") no-repeat top left;background-size: contain;text-indent: -9999px; margin-top: 5px;}
         </style>
    </head>

    <body class="home blog halimthemes halimmovies" data-masonry="">
        <header id="header">
           <div class="container">
              <div class="row" id="headwrap">
                {{-- LOGO --}}
                 <div class="col-md-3 col-sm-6 slogan">
                    <p class="site-title"><a class="logo" href="{{url('/')}}"></a></p>
                 </div>
                 <div class="col-md-5 col-sm-6 halim-search-form hidden-xs">
                    <div class="header-nav">
                       <div class="col-xs-12">
                          <style type="text/css">
                             ul#resultSearch{
                                position: absolute;;
                                z-index: 9999;
                                background: #1b2d3c;
                                width: 90%;
                                padding: 10px;
                                margin: 1px;
                             }
                          </style>
                          <!-- TÌM KIẾM PHIM -->
                             <div class="form-group">
                                <div class="input-group col-xs-9">
                                   <form action="{{route('tim-kiem')}}" method="GET">
                                      <input type="text" name="search" id="timkiem" class="form-control" placeholder="Tìm kiếm phim.." autocomplete="off" required>
                                      <button type="submit"
                                      style="position: absolute;
                                      top: 50%;
                                      right: -20%;
                                      transform: translate(-50%, -50%);
                                      padding: 10px 20px;
                                      background-color: #3c3635;
                                      color: #ffffff;
                                      border-radius:50%;"><i class="fas fa-search"></i></button>
                                   </form>
                                </div>
                             </div>
                            <ul class="list-group" id="resultSearch" style="display: none"></ul>
                       </div>
                    </div>
                 </div>



                 <div class="col-md-4 hidden-xs" style="margin-left: 780px; margin-top: -45px">
                {{-- ĐĂNG KÝ / ĐĂNG NHẬP --}}
                     @if (Auth::check())
                       <!-- Hiển thị menu dropdown khi đã đăng nhập -->
                       <div class="dropdown" style="margin-right:180px; margin-top: 0px;">
                          <button class="btn btn-secondary dropdown-toggle" type="button" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <i class="fa-solid fa-gear"></i>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{route('setting_info')}}">Tài khoản</a><br>
                                <a class="dropdown-item" href="{{route('log_out')}}">Đăng xuất</a>
                          </div>
                       </div>
                       {{-- Bookmark phim --}}
                       <a href="{{route('show_bookmark')}}"><button class="btn btn-warning">Bookmark</button></a>
                     @else
                       <!-- Hiển thị nút icon đăng ký và đăng nhập khi chưa đăng nhập -->
                        <span style="padding: 10px">
                           <a href="{{ route('login') }}">
                              <i class="fa-solid fa-house-user"></i>
                              <span class="login-text">Login</span>
                           </a>
                        </span>
                        <span style="padding: 10px">
                           <a href="{{ route('register') }}">
                              <i class="fa-solid fa-user-plus"></i>
                              <span class="login-text">Register</span>
                           </a>
                        </span>
                     @endif

                 </div>

              </div>
           </div>
        </header>
        <div class="navbar-container">
           <div class="container">
              <nav class="navbar halim-navbar main-navigation" role="navigation" data-dropdown-hover="1">
                 <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed pull-left" data-toggle="collapse" data-target="#halim" aria-expanded="false">
                    <span class="sr-only">Menu</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    {{-- <button type="button" class="navbar-toggle collapsed pull-right expand-search-form" data-toggle="collapse" data-target="#search-form" aria-expanded="false">
                    <i class="fa-solid fa-magnifying-glass" style="color: white" aria-hidden="true"></i>
                    </button>
                    <button type="button" class="navbar-toggle collapsed pull-right get-bookmark-on-mobile" style="color: rgba(0, 255, 42, 0.459); font-weigh: bold">
                    Bookmarks <i class="fa-solid fa-bookmark" aria-hidden="true"></i>
                    <span class="count">0</span>
                    </button>
                    <button type="button" class="navbar-toggle collapsed pull-right get-locphim-on-mobile">
                    <a href="javascript:;" id="expand-ajax-filter" style="color: #c4b422;">Lọc <i class="fas fa-filter"></i></a>
                    </button> --}}
                 </div>

                 {{-- MENU --}}
                 <div class="collapse navbar-collapse" id="halim">
                    <div class="menu-menu_1-container">
                       <ul id="menu-menu_1" class="nav navbar-nav navbar-left">
                          <li class="current-menu-item active">
                             <a title="Trang Chủ" href="{{route('homepage')}}">Trang Chủ</a>
                          </li>
                          <li class="mega dropdown">
                             <a title="Thể Loại" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true">Thể Loại<span class="caret"></span></a>
                             <ul role="menu" class=" dropdown-menu">
                                @foreach($genre as $key => $cate)
                                   <li><a title="{{$cate->title}}" href="{{route('genre',$cate->slug)}}">{{$cate->title}}</a></li>
                                @endforeach
                             </ul>
                          </li>
                          <li class="mega dropdown">
                             <a title="Quốc Gia" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true">Quốc Gia<span class="caret"></span></a>
                             <ul role="menu" class=" dropdown-menu">
                                @foreach($country as $key => $cate)
                                   <li><a title="{{$cate->title}}" href="{{route('country',$cate->slug)}}">{{$cate->title}}</a></li>
                                @endforeach
                             </ul>
                          </li>
                          <li class="mega dropdown">
                             <a title="Năm Phát Hành" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true">Năm Phát Hành<span class="caret"></span></a>
                             <ul role="menu" class=" dropdown-menu">
                                @for($year=1980; $year<=2023; $year++)
                                   <li><a title="{{$year}}" href="{{url('nam/'.$year)}}">{{$year}}</a></li>
                                @endfor
                             </ul>
                          </li>
                          @foreach($category as $key => $cate)
                             <li class="mega"><a title="{{$cate->title}}" href="{{route('category',$cate->slug)}}">{{$cate->title}}</a></li>
                          @endforeach

                       </ul>
                    </div><br><br>
                    {{-- <ul class="nav navbar-nav navbar-left" style="background:#000;">
                       <li><a href="#" onclick="locphim()" style="color: #ffed4d;">Lọc Phim</a></li>
                    </ul> --}}

                       {{-- Thông báo đăng nhập thành công --}}
                        @if(Session::has('success'))
                           <div id="welcome-alert" class="alert alert-success row" role="alert">
                              {{Session::get('success')}}
                           </div>
                           <script>
                              // Tự động ẩn thông báo sau 2 giây
                              setTimeout(function(){
                                 document.getElementById('welcome-alert').style.display = 'none';
                              }, 2000);
                           </script>
                        @endif
                 </div>
                 {{-- END MENU --}}
              </nav>
              <div class="collapse navbar-collapse" id="search-form">
                 <div id="mobile-search-form" class="halim-search-form"></div>
              </div>
              <div class="collapse navbar-collapse" id="user-info">
                 <div id="mobile-user-login"></div>
              </div>
           </div>
        </div>
        </div>

        <div class="container">
           <div class="row fullwith-slider"></div>
        </div>

        {{-- ===============Đây là phần content thay đổi giữa các page=============== --}}
        <div class="container">
           @yield('content')
        </div>

        <!-- FOOTER -->
        <footer class="text-center text-lg-start bg-light text-muted">

           <!-- Các mạng xã hội liên kết với website-->
           <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
           <div class="me-5 d-none d-lg-block">
              <span>Get connected with us on social networks:</span>
           </div><br>
           <div>
              <a href="" class="me-4 text-reset">
                 <i class="fab fa-facebook-f" style="font-size: 30px"></i>
              </a>
              <a href="" class="me-4 text-reset">
                 <i class="fab fa-twitter" style="font-size: 30px"></i>
              </a>
              <a href="" class="me-4 text-reset">
                 <i class="fab fa-google" style="font-size: 30px"></i>
              </a>
              <a href="" class="me-4 text-reset">
                 <i class="fab fa-instagram" style="font-size: 30px"></i>
              </a>
              <a href="" class="me-4 text-reset">
                 <i class="fab fa-linkedin" style="font-size: 30px"></i>
              </a>
              <a href="" class="me-4 text-reset">
                 <i class="fab fa-github" style="font-size: 30px"></i>
              </a>
           </div><br>
           </section>

           <!-- Các đường link truy cập nhanh ở cuối trang  -->
           <section class="">
           <div class="container text-center text-md-start mt-5">
              <div class="row mt-3">

                 <!-- Logo + Giới thiệu trang web -->
                 <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                 <h6 class="text-uppercase fw-bold mb-4" style="font-size: 30px; font-weight: bold;">
                    <i class="fas fa-gem me-3"></i>WebPhim
                 </h6>
                 <p>
                    Web xem phim trực tuyến
                 </p>
                 <p>
                    Phim mới cập nhật hằng ngày
                 </p>
                 </div>

                 <!-- Footer column 1-->
                 <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                 <h6 class="text-uppercase fw-bold mb-4">
                    Chính Sách
                 </h6>
                 <p>
                    <a href="#!" class="text-reset">Điều khoản sử dụng</a>
                 </p>
                 <p>
                    <a href="#!" class="text-reset">Liên hệ quảng cáo</a>
                 </p>
                 <p>
                    <a href="#!" class="text-reset">FAQs</a>
                 </p>
                 </div>

                 <!-- Footer column 2-->
                 <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                 <h6 class="text-uppercase fw-bold mb-4">
                    Truy Cập Nhanh
                 </h6>
                 <p>
                    <a href="{{URL::to('/danh-muc/phim-chieu-rap')}}" class="text-reset">Phim Chiếu Rạp Mới Nhất</a>
                 </p>
                 <p>
                    <a href="{{URL::to('/danh-muc/phim-hanh-dong')}}" class="text-reset">Phim Hành Động Mới Nhất</a>
                 </p>
                 <p>
                    <a href="{{URL::to('/danh-muc/phim-tinh-cam')}}" class="text-reset">Phim Tình Cảm Mới Nhất</a>
                 </p>
                 <p>
                    <a href="{{URL::to('/danh-muc/phim-kinh-di')}}" class="text-reset">Phim Kinh Dị Mới Nhất</a>
                 </p>
                 </div>

                 <!-- Footer Column 3-->
                 <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                 <h6 class="text-uppercase fw-bold mb-4">Liên hệ</h6>
                 <p><i class="fas fa-home me-3"></i> Việt Nam</p>
                 <p>
                    <i class="fas fa-envelope me-3"></i>
                    info@example.com
                 </p>
                 <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
                 <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
                 </div>
              </div>
           </div>
           </section>

           <!-- Copyright - Bản quyền -->
           <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
           © 2024 Copyright:
           <a class="text-reset fw-bold" href="{{url('/')}}">WebPhim</a>
           </div>
        </footer>
        <!--END FOOTER -->

        <!-- Nút Back-To-Top -->
        <div id='easy-top'></div>

        <!-- Các script /jQuery -->
        <script type='text/javascript' src='{{asset('js/bootstrap.min.js?ver=5.7.2')}}' id='bootstrap-js'></script>
        <script type='text/javascript' src='{{asset('js/owl.carousel.min.js?ver=5.7.2')}}' id='carousel-js'></script>

        <script type='text/javascript' src='{{asset('js/halimtheme-core.min.js?ver=1626273138')}}' id='halim-init-js'></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

       <!-- Lọc top views theo ngày/tuần/tháng -->
       <script type="text/javascript">
        $(document).ready(function(){
           //Lấy ra top view theo ngày, mặc định cho nó hiển thị lên sẵn
           $.ajax({
              url:"{{url('/filter-topview-default')}}",
              method:"GET",
              success:function(data){
                 $('#show_data_default').html(data);
              }
           });


           $('.filter-sidebar').click(function(){
              var href = $(this).attr('href');
              if(href == '#ngay'){
                 var value = 0;
              }else if(href == '#tuan'){
                 var value = 1;
              }else{
                 var value = 2;
              }

              $.ajax({
                 url:"{{url('/filter-topview-phim')}}",
                 method:"POST",
                 data:{value:value},
                 headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 },
                 success:function(data){
                    $('#halim-ajax-popular-post-default').css("display","none");

                    $('#show_data').html(data);
                 }
              });
           });
        });
        </script>

        {{-- Các css có sẵn  --}}
        <style>#overlay_mb{position:fixed;display:none;width:100%;height:100%;top:0;left:0;right:0;bottom:0;background-color:rgba(0, 0, 0, 0.7);z-index:99999;cursor:pointer}#overlay_mb .overlay_mb_content{position:relative;height:100%}.overlay_mb_block{display:inline-block;position:relative}#overlay_mb .overlay_mb_content .overlay_mb_wrapper{width:600px;height:auto;position:relative;left:50%;top:50%;transform:translate(-50%, -50%);text-align:center}#overlay_mb .overlay_mb_content .cls_ov{color:#fff;text-align:center;cursor:pointer;position:absolute;top:5px;right:5px;z-index:999999;font-size:14px;padding:4px 10px;border:1px solid #aeaeae;background-color:rgba(0, 0, 0, 0.7)}#overlay_mb img{position:relative;z-index:999}@media only screen and (max-width: 768px){#overlay_mb .overlay_mb_content .overlay_mb_wrapper{width:400px;top:3%;transform:translate(-50%, 3%)}}@media only screen and (max-width: 400px){#overlay_mb .overlay_mb_content .overlay_mb_wrapper{width:310px;top:3%;transform:translate(-50%, 3%)}}</style>

        <style>
           #overlay_pc {
           position: fixed;
           display: none;
           width: 100%;
           height: 100%;
           top: 0;
           left: 0;
           right: 0;
           bottom: 0;
           background-color: rgba(0, 0, 0, 0.7);
           z-index: 99999;
           cursor: pointer;
           }
           #overlay_pc .overlay_pc_content {
           position: relative;
           height: 100%;
           }
           .overlay_pc_block {
           display: inline-block;
           position: relative;
           }
           #overlay_pc .overlay_pc_content .overlay_pc_wrapper {
           width: 600px;
           height: auto;
           position: relative;
           left: 50%;
           top: 50%;
           transform: translate(-50%, -50%);
           text-align: center;
           }
           #overlay_pc .overlay_pc_content .cls_ov {
           color: #fff;
           text-align: center;
           cursor: pointer;
           position: absolute;
           top: 5px;
           right: 5px;
           z-index: 999999;
           font-size: 14px;
           padding: 4px 10px;
           border: 1px solid #aeaeae;
           background-color: rgba(0, 0, 0, 0.7);
           }
           #overlay_pc img {
           position: relative;
           z-index: 999;
           }
           @media only screen and (max-width: 768px) {
           #overlay_pc .overlay_pc_content .overlay_pc_wrapper {
           width: 400px;
           top: 3%;
           transform: translate(-50%, 3%);
           }
           }
           @media only screen and (max-width: 400px) {
           #overlay_pc .overlay_pc_content .overlay_pc_wrapper {
           width: 310px;
           top: 3%;
           transform: translate(-50%, 3%);
           }
           }
        </style>

        <style>
           .float-ck { position: fixed; bottom: 0px; z-index: 9}
           * html .float-ck
           #hide_float_left a {background: #0098D2;padding: 5px 15px 5px 15px;color: #FFF;font-weight: 700;float: left;}
           #hide_float_left_m a {background: #0098D2;padding: 5px 15px 5px 15px;color: #FFF;font-weight: 700;}
           span.bannermobi2 img {height: 70px;width: 300px;}
           #hide_float_right a { background: #01AEF0; padding: 5px 5px 1px 5px; color: #FFF;float: left;}
        </style>

        <!-- BẤM VÀO NÚT "XEM TRAILER" THÌ PAGE CUỘN XUỐNG CHỖ TRAILER-->
        <script type="text/javascript">
           $(".watch_trailer").click(function(e){
              e.preventDefault();
              var aid = $(this).attr("href");
              $('html, body').animate({scrollTop: $(aid).offset().top}, 'slow');
           });
        </script>

        <!-- TÌM KIẾM PHIM -->
        <script type="text/javascript">
           $(document).ready(function(){
              $('#timkiem').keyup(function(){

                 var search = $('#timkiem').val();
                 if(search != ''){
                    $('#resultSearch').css('display', 'inherit');
                    var expression = new RegExp(search, "i");
                    $.getJSON('/json/movies.json', function(data){
                       $('#resultSearch').html('');
                       $.each(data, function(key, value){
                          if(value.title.search(expression) != -1){
                             $('#resultSearch').append('<li style="cursor: pointer; list-style-type: none;" class="list-group-item" onmouseover="this.style.backgroundColor=\'#ffed4d\'" onmouseout="this.style.backgroundColor=\'\'"><img src="/uploads/movie/' + value.image + '" height="40" width="40"/>' + ' ' + value.title + '<br/> * <span>'+ 'Phim ' + value.genre.title + ' ' + value.country.title + ' ' + value.thoi_luong + '</span></li>');
                             }
                          });
                       });
                    }else{
                       $('#resultSearch').css('display', 'none');
                    }
                 });
                 $('#resultSearch').on('click', 'li', function(){
                    var click_text = $(this).text().split('*');
                    $('#timkiem').val($.trim(click_text[0]));
                    $('#resultSearch').html('');
                 });
              });
        </script>

      {{-- HIỂN THỊ DANH SÁCH BOOKMARK PHIM --}}
      <script type="text/javascript">
         document.addEventListener('DOMContentLoaded', function() {
         var toggleBtn = document.querySelector('.bookmark-toggle-btn');
         var dropdown = document.querySelector('.bookmark-dropdown');

         toggleBtn.addEventListener('click', function() {
            dropdown.classList.toggle('show');
         });

         document.addEventListener('click', function(event) {
            if (!dropdown.contains(event.target) && !toggleBtn.contains(event.target)) {
                  dropdown.classList.remove('show');
            }
         });
      });
      </script>
      
      {{-- Tự động logout khi thoát trang --}}
      {{-- <script type="text/javascript">
      window.addEventListener("beforeunload", function(e) {
         $.ajax({
            url:"{{url('/log-out')}}",
            type: 'GET',
            xhrFields: {
               withCredentials: true // Đảm bảo gửi cookie cùng với yêu cầu
            }
         });
       });
      </script>  --}}
     </body>
</html>
