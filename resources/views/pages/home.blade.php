{{-- TRANG HOMEPAGE --}}

@extends('layout')
@section('content')
<div class="row container" id="wrapper">
            <div class="halim-panel-filter">
               <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
                  <div class="ajax"></div>
               </div>
            </div>
            {{-- Slide đầu trang --}}
            <div id="halim_related_movies-2" class="wrap-slider">
               <div class="section-bar clearfix">
                  <h3 class="section-title"><span>PHIM HOT</span></h3>
               </div>
               <div id="halim_related_movies-200" class="owl-carousel owl-theme related-film">
                  {{-- Biến $phimhot lấy bên IndexController, trong hàm home() --}}
                  @foreach($phimhot as $key => $mov) 
                  <article class="thumb grid-item post-38498">
                     <div class="halim-item">
                        <a class="halim-thumb" href="{{route('movie',$mov->slug)}}" title="{{$mov->title}}">
                           <figure><img class="lazy img-responsive" src="{{asset('uploads/movie/'.$mov->image)}}" alt="{{$mov->title}}" title="{{$mov->title}}"></figure>
                           <span class="status">
                              @if($mov->resolution==0)
                                 720p
                              @elseif($mov->resolution==1)
                                 1080p
                              @elseif($mov->resolution==2)
                                 HD+
                              @elseif($mov->resolution==3)
                                 UHD
                              @elseif($mov->resolution==4)
                                 4K
                              @else
                                 Trailer
                              @endif
                           </span>

                           <!--Hiển thị Vietsub /Thuyết Minh-->
                              @if($mov->resolution!=5)
                                 </span><span class="episode"><i aria-hidden="true"></i>
                                    @if($mov->phude==1)
                                       Thuyết Minh
                                    @elseif($mov->phude==0)
                                       Vietsub
                                    @endif                              
                                 </span>
                              @endif

                           <div class="icon_overlay"></div>
                           <div class="halim-post-title-box">
                              <div class="halim-post-title ">
                                 <p class="entry-title">{{$mov->title}}</p>
                                 <p class="original_title">{{$mov->name_eng}}</p>
                                 <p class="original_title">
                                    @if($mov->season!=0)
                                       Season {{$mov->season}}
                                    @endif
                                 </p>
                              </div>
                           </div>
                        </a>
                     </div>
                  </article>
                  @endforeach
               </div>
               <script>
                  $(document).ready(function($) {				
                  var owl = $('#halim_related_movies-200');
                  owl.owlCarousel({
                     loop: true,
                     margin: 4,
                     autoplay: true,
                     autoplayTimeout: 2000,
                     autoplayHoverPause: true,
                     nav: true,
                     navText: ['<i class="fa-solid fa-chevron-left"></i>', '<i class="fa-solid fa-chevron-right"></i>'],
                     responsiveClass: true,
                     responsive: {0: {items:2},480: {items:3}, 600: {items:4},1000: {items: 6}}})});
               </script>
            </div>
            {{-- End Slide đầu trang --}}

            {{-- Body: Hiển thị danh mục + 8 phim mỗi danh mục ở giữa website --}}
            <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
               @foreach($category_home as $key => $cate_home)
               <section id="halim-advanced-widget-2">
                  <div class="section-heading">
                     <a href="{{route('category',$cate_home->slug)}}" title="{{$cate_home->title}}">
                     <span class="h-text">{{$cate_home->title}}</span>
                     </a>
                  </div>
                  <div id="halim-advanced-widget-2-ajax-box" class="halim_box">
                     @foreach($cate_home->movie->sortByDesc('id')->take(8) as $key => $mov)
                        <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-37606">
                           <div class="halim-item">
                              <a class="halim-thumb" href="{{route('movie',$mov->slug)}}">
                                 <figure><img class="lazy img-responsive" src="{{asset('uploads/movie/'.$mov->image)}}" alt="{{$mov->title}}" title="{{$mov->title}}"></figure>
                                 <span class="status">
                                    @if($mov->resolution==0)
                                       720p
                                    @elseif($mov->resolution==1)
                                       1080p
                                    @elseif($mov->resolution==2)
                                       HD+
                                    @elseif($mov->resolution==3)
                                       UHD
                                    @elseif($mov->resolution==4)
                                       4K
                                    @else
                                       Trailer
                                    @endif   
                                 </span>

                                 <!--Hiển thị Vietsub /Thuyết Minh-->
                                 @if($mov->resolution!=5)
                                    <span class="episode"><i aria-hidden="true"></i>
                                       @if($mov->phude==1)
                                          Thuyết Minh
                                       @elseif($mov->phude==0)
                                          Vietsub
                                       @endif                              
                                    </span>
                                 @endif

                                 <div class="icon_overlay"></div>
                                 <div class="halim-post-title-box">
                                    <div class="halim-post-title ">
                                       <p class="entry-title">{{$mov->title}}</p>
                                       <p class="original_title">{{$mov->name_eng}}</p>
                                       <p class="original_title">
                                          @if($mov->season!=0)
                                             Season {{$mov->season}}
                                          @endif
                                       </p>
                                    </div>
                                 </div>
                              </a>
                           </div>
                        </article> 
                     @endforeach                                        
                  </div>
               </section>
               @endforeach
               <div class="clearfix"></div>
            </main>
            {{-- Hiển thị danh mục + 8 phim mỗi danh mục ở giữa website --}}

            <!-- Sidebar -->
            @include('pages.include.sidebar')
         </div>
@endsection