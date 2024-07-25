@extends('layout')
@section('content')
<link rel="stylesheet" href="https://cdn.plyr.io/3.7.2/plyr.css">
<div class="row container" id="wrapper">
         <div class="halim-panel-filter">
            <div class="panel-heading">
               <div class="row">
                  <div class="col-xs-9">
                     <div class="yoast_breadcrumb hidden-xs">
                        <span>
                           <span>
                              <span>Bạn đang xem phim » </span>
                              <span>
                                 <a href="{{route('country', [$movie->country->slug])}}">{{$movie->country->title}}</a> » 
                                 <span class="breadcrumb_last" aria-current="page">
                                    <a href="">{{$movie->title}}</a>
                                 </span>
                              </span>
                           </span>
                        </span>
                     </div>
                  </div>
               </div>
            </div>
            <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
               <div class="ajax"></div>
            </div>
         </div>
         <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
            <section id="content" class="test">
               <div class="clearfix wrap-content">

                  {{-- Video Phim --}}                
                  <div>
                        <video id="videoPlayer" controls style="width: 810px; height: 500px">
                           <source id="videoSource" src="{{ asset($episode->linkphim720) }}" type="video/mp4">
                        </video>
                        <span>Bạn đang xem phim tại WebPhim</span><br>                  
                 </div>                  
               
                  <div class="clearfix"></div>
                  <div class="clearfix"></div>
                  <div class="title-block">
                     <a href="javascript:;" data-toggle="tooltip" title="Add to bookmark">
                        <div id="bookmark" class="bookmark-img-animation primary_ribbon" data-id="37976">
                           <div class="halim-pulse-ring" style="margin-top: 12px"></div>
                        </div>
                     </a>
                     <div class="title-wrapper-xem full">
                        <h3 class="entry-title"><a href="{{route('movie',$movie->slug)}}" title="{{$movie->title}}" class="tl">{{$movie->title}}</a></h3>
                     </div>
                  </div>
                  <div class="entry-content htmlwrap clearfix collapse" id="expand-post-content">
                     <article id="post-37976" class="item-content post-37976"></article>
                  </div>
                  <div class="clearfix"></div>
                  <div class="text-center">
                     <div id="halim-ajax-list-server"></div>
                  </div>
                  <div id="halim-list-server">
                     <ul class="nav nav-tabs" role="tablist">
                        @if($movie->resolution!=5)
                           <span class="episode"><i aria-hidden="true"></i>
                              @if($movie->phude==1)
                                 <li role="presentation" class="active server-1"><a href="#server-0" aria-controls="server-0" role="tab" data-toggle="tab"><i class="hl-server"></i>Thuyết Minh
                                 </a></li>
                              @elseif($movie->phude==0)
                                 <li role="presentation" class="active server-1"><a href="#server-0" aria-controls="server-0" role="tab" data-toggle="tab"><i class="hl-server"></i>Vietsub
                                 </a></li>
                              @endif                              
                           </span>
                        @endif
                        
                     </ul>
                     <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active server-1" id="server-0">
                           <div class="halim-server">
                              <ul class="halim-list-eps">
                                 @foreach($movie->episode as $key => $sotap)
                                    @if($sotap->episode=='phimle')
                                       
                                    @else
                                       <a href="{{url('xem-phim/'.$movie->slug.'/tap-'.$sotap->episode)}}">
                                          <li class="halim-episode"><span class="halim-btn halim-btn-2 {{$tapphim==$sotap->episode ? 'active' : ''}} halim-info-1-1 box-shadow" data-post-id="37976" data-server="1" data-episode="1" data-position="first" data-embed="0" data-title="Xem phim {{$movie->title}} - Tập {{$sotap->episode}} - {{$movie->name_eng}}" data-h1="{{$movie->title}} - tập {{$sotap->episode}}">{{$sotap->episode}}</span>
                                          </li>
                                       </a>
                                    @endif
                                 @endforeach
                              </ul>
                              <div class="clearfix"></div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="clearfix"></div>
                  <div class="htmlwrap clearfix">
                     <div id="lightout"></div>
                  </div>
            </section>
            
            {{-- Slider hiển thị các phim có liên quan --}}
            <section class="related-movies">
               <div id="halim_related_movies-2xx" class="wrap-slider">
                  <div class="section-bar clearfix">
                     <h3 class="section-title"><span>NGƯỜI XEM {{strtoupper($movie->title)}} CŨNG XEM</span></h3>
                     {{-- strtoupper() dùng để chuyển thành chữ in hoa --}}
                  </div>
                  <div id="halim_related_movies-100" class="owl-carousel owl-theme related-film">
                     @foreach($related as $key => $hot)
                     <article class="thumb grid-item post-38498">
                        <div class="halim-item">
                           <a class="halim-thumb" href="{{route('movie',$hot->slug)}}" title="{{$hot->title}}">
                              <figure><img class="lazy img-responsive" src="{{asset('uploads/movie/'.$hot->image)}}" alt="{{$hot->title}}" title="{{$hot->title}}"></figure>
                              <span class="status">
                                 @if($hot->resolution==0)
                                    720p
                                 @elseif($hot->resolution==1)
                                    1080p
                                 @elseif($hot->resolution==2)
                                    HD+
                                 @elseif($hot->resolution==3)
                                    UHD
                                 @elseif($hot->resolution==4)
                                    4K
                                 @else
                                    Trailer
                                 @endif   
                              </span>
                              
                              <!--Hiển thị Vietsub /Thuyết Minh-->
                              @if($hot->resolution!=5)
                              <span class="episode"><i aria-hidden="true"></i>
                                 @if($hot->phude==1)
                                    Thuyết Minh
                                 @elseif($hot->phude==0)
                                    Vietsub
                                 @endif                              
                              </span>
                              @endif

                              <div class="icon_overlay"></div>
                              <div class="halim-post-title-box">
                                 <div class="halim-post-title ">
                                    <p class="entry-title">{{$hot->title}}</p>
                                    <p class="original_title">{{$hot->name_eng}}</p>
                                    <p class="original_title">
                                       @if($hot->season!=0)
                                          Season {{$hot->season}}
                                       @endif
                                    </p>
                                 </div>
                              </div>
                           </a>
                        </div>
                     </article>
                     @endforeach
                   </div>

                  {{-- SLIDER - các phim có liên quan --}}
                  <script>
                     $(document).ready(function($) {				
                     var owl = $('#halim_related_movies-100');
                     owl.owlCarousel({
                        loop: true,
                        margin: 4,
                        autoplay: true,
                        autoplayTimeout: 2000,
                        autoplayHoverPause: true,
                        nav: true,
                        navText: [
                           '<i class="fa-solid fa-chevron-left"></i>', 
                           '<i class="fa-solid fa-chevron-right"></i>'],
                        responsiveClass: true,
                        responsive: {
                           0: {items:2},
                           480: {items:3}, 
                           600: {items:4},
                           800: {items:4},
                           1200: {items: 5}}})});
                  </script>
               </div>
            </section>
            {{-- End Slider các phim có liên quan --}}
         </main>
         <!-- Sidebar -->
         @include('pages.include.sidebar')
      </div>

{{-- Điều khiển tua nhanh/chậm video --}}
<script>
   function seekVideo(seconds) {
       var video = document.getElementById("videoPlayer");
       video.currentTime += seconds;
   }
</script>      

@endsection