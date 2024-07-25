@extends('layout')
@section('content')
<div class="row container" id="wrapper">
            <div class="halim-panel-filter">
               <div class="panel-heading">
                  <div class="row">
                     <div class="col-xs-7">
                        <div class="yoast_breadcrumb hidden-xs">
                           <span>
                              <span>
                                 <a href="{{route('category',$movie->category->slug)}}">{{$movie->category->title}}</a> » 
                                    <span>
                                       <a href="{{route('country',$movie->country->slug)}}">{{$movie->country->title}}</a> » 

                                       @foreach($movie->movie_genre as $gen)
                                       <a href="{{route('genre',$gen->slug)}}">{{$gen->title}}</a> »
                                       @endforeach 

                                       <span class="breadcrumb_last" aria-current="page">{{$movie->title}}
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
                    
                     <div class="halim-movie-wrapper">
                        
                        <div class="movie_info col-xs-12">
                           <div class="movie-poster col-md-3">
                              {{-- Poster phim --}}
                              <img class="movie-thumb" src="{{asset('uploads/movie/'.$movie->image)}}" alt="{{$movie->title}}">
                              
                              {{-- Bookmark phim --}}
                              @if (Auth::check())
                              <form action="{{ route('add_bookmark') }}" method="POST">
                                 @csrf
                                 <div id="bookmark" class="bookmark-img-animation primary_ribbon" data-id="38424">
                                    <div class="halim-pulse-ring" style="margin-left: 75px"></div>
                                 </div>
                                 <input type="hidden" name="movie_id" value="{{ $movie->id }}">
                                 <button class="btn btn-danger" type="submit">Bookmark</button>
                             </form>
                              @endif

                              <!-- Nút bấm Play phim hoặc bấm Xem Trailer -->
                              @if($movie->resolution!=5)
                                 @if($episode_uploaded_count > 0)
                                    <div class="bwa-content" style="margin-top:-60px">
                                       <div class="loader"></div>
                                       <a href="{{url('xem-phim/'.$movie->slug.'/tap-'.$episode_tapdau->episode)}}" class="bwac-btn">
                                       <i class="fa fa-play"></i>
                                       </a>
                                    </div>
                                 @endif
                              @else
                                 <button class="btn btn-secondary" style="position: absolute;
                                 top: 50%;
                                 left: 50%;
                                 transform: translate(-50%, -50%);
                                 padding: 10px 20px;
                                 background-color: #f44336;
                                 color: #ffffff;
                                 text-decoration: none;">
                                 <a href="#watch_trailer" class="bwac-btn watch_trailer"><b>Xem Trailer</b>
                                 </a></button>
                              @endif

                           </div>

                           <div class="film-poster col-md-9">
                              <h1 class="movie-title title-1" style="display:block;line-height:35px;margin-bottom: -14px;color: #ffed4d;text-transform: uppercase;font-size: 18px;">{{$movie->title}}</h1>
                              <h2 class="movie-title title-2" style="font-size: 12px;">{{$movie->name_eng}}</h2>
                              <ul class="list-info-group">
                                 <li class="list-info-group-item"><span>Chất Lượng Phim</span> : <span class="quality">
                                    @if($movie->resolution==0)
                                       720p
                                    @elseif($movie->resolution==1)
                                       1080p
                                    @elseif($movie->resolution==2)
                                       HD+
                                    @elseif($movie->resolution==3)
                                       UHD
                                    @elseif($movie->resolution==4)
                                       4K
                                    @else
                                       Trailer
                                    @endif 
                                 </span>
                                 
                                 <!--Hiển thị Vietsub /Thuyết Minh-->
                                 @if($movie->resolution!=5)
                                 <span class="episode"><i aria-hidden="true"></i>
                                    @if($movie->phude==1)
                                       Thuyết Minh
                                    @elseif($movie->phude==0)
                                       Vietsub
                                    @endif                              
                                 </span>
                                 @endif
                                 </li>

                                 @if($movie->season!=0)
                                    <li class="list-info-group-item"><span>Season</span> : {{$movie->season}}</li>
                                 @endif

                                 {{-- <li class="list-info-group-item">
                                    <span>Điểm IMDb</span> : <span class="imdb">7.2</span>
                                 </li> --}}

                                 <li class="list-info-group-item">
                                    <span>Thời lượng</span> : {{$movie->thoi_luong}}
                                 </li>

                                 <li class="list-info-group-item">
                                    <span>Danh mục</span> : 
                                    <a href="{{route('category',$movie->category->slug)}}" rel="category tag">{{$movie->category->title}}
                                    </a>
                                 </li>

                                 <li class="list-info-group-item">
                                    <span>Thể loại</span> : 
                                    <!-- Lấy ra các thể loại của phim này -->
                                    @foreach($movie->movie_genre as $gen)
                                       <a href="{{route('genre',$gen->slug)}}" rel="category tag">
                                       {{$gen->title}} - 
                                    </a>
                                    @endforeach                                    
                                 </li>

                                 <li class="list-info-group-item"><span>Quốc gia</span> : <a href="{{route('country',$movie->country->slug)}}" rel="tag">{{$movie->country->title}}</a></li>

                                 
                                 {{-- Số lượng tập phim đã tải lên / Số lượng tổng --}}
                                 <li class="list-info-group-item">
                                    <span>Trạng Thái</span> : 
                                    @if($movie->thuocphim=='phimbo')
                                       {{$episode_uploaded_count}}/{{$movie->sotap}} Tập - 
                                       @if($episode_uploaded_count==$movie->sotap)
                                          Hoàn thành
                                       @else
                                          Đang cập nhật
                                       @endif
                                    @else
                                       Phim Lẻ
                                    @endif
                                 </li>

                                 {{-- Danh sách toàn bộ các tập phim --}}
                                 <li class="list-info-group-item"><span>Danh sách tập phim</span> : 
                                    {{-- Nếu là phim bộ có nhiều tập, thì hiển thị ra các tập phim --}}
                                    @if($movie->thuocphim=='phimbo')
                                       @if(isset($episode))
                                          @php
                                             // Sắp xếp mảng $episode theo thứ tự tăng dần của episode
                                             $sortedEpisodes = $episode->sortBy('episode');
                                          @endphp

                                          @foreach($sortedEpisodes as $key => $ep)
                                          <button class="btn btn-primary"><a href="{{url('xem-phim/'.$movie->slug.'/tap-'.$ep->episode)}}" rel="tag">{{$ep->episode}}</a></button>
                                          @endforeach
                                       @else
                                          Đang cập nhật
                                       @endif
                                    {{-- Nếu là phim lẻ thì chỉ hiển thị chữ "Phim Lẻ" --}}
                                    @elseif($movie->thuocphim=='phimle')
                                       @if(isset($episode_tapdau->episode))
                                          <button class="btn btn-primary"><a href="{{url('xem-phim/'.$movie->slug.'/tap-'.$episode_tapdau->episode)}}" rel="tag">Phim Lẻ</a></button>
                                       @else
                                          Đang cập nhật
                                       @endif
                                    @endif
                                 </li>
                                 
                              </ul>
                              
                           {{-- <div class="movie-trailer hidden"></div> --}}
                           </div>
                        </div>
                     </div>
                     <div class="clearfix"></div>
                     {{-- ĐÁNH GIÁ PHIM --}}
                     <ul class="list-inline rating" title="Rating">
                        @for($count=5; $count>=1; $count--)
                           @php
                              if($count <= $rating){
                                 $color = 'color:#ffcc00;';
                              } else {
                                 $color = 'color:#ccc;';
                              }
                           @endphp

                           <li title="star_rating"
                              id="{{$movie->id}}-{{$count}}"
                              data-index = "{{$count}}"
                              data-movie_id = "{{$movie->id}}"
                              data-rating = "{{$rating}}"
                              class = "rating"
                              style = "cursor:pointer; {{$color}} 
                              font-size: 30px;">&#9733;
                           </li>
                        @endfor
                     </ul>
                     <span class="total_rating">Đánh giá: {{$rating}}/{{$count_total}} lượt</span>
                     {{-- NỘI DUNG PHIM + TỪ KHÓA TÌM KIẾM --}}
                     <div class="section-bar clearfix">
                        <h2 class="section-title"><span style="color:#ffed4d">Nội dung phim</span></h2>
                     </div>
                     
                     <div class="entry-content htmlwrap clearfix">
                        <div class="video-item halim-entry-box">
                           {{-- <li class="list-info-group-item"><span>Đạo diễn</span> : <a class="director" rel="nofollow" href="https://phimhay.co/dao-dien/cate-shortland" title="Cate Shortland">Cate Shortland</a></li>
                           <li class="list-info-group-item last-item" style="-overflow: hidden;-display: -webkit-box;-webkit-line-clamp: 1;-webkit-box-flex: 1;-webkit-box-orient: vertical;"><span>Diễn viên</span> : <a href="" rel="nofollow" title="C.C. Smiff">C.C. Smiff</a>, <a href="" rel="nofollow" title="David Harbour">David Harbour</a>, <a href="" rel="nofollow" title="Erin Jameson">Erin Jameson</a>, <a href="" rel="nofollow" title="Ever Anderson">Ever Anderson</a>, <a href="" rel="nofollow" title="Florence Pugh">Florence Pugh</a>, <a href="" rel="nofollow" title="Lewis Young">Lewis Young</a>, <a href="" rel="nofollow" title="Liani Samuel">Liani Samuel</a>, <a href="" rel="nofollow" title="Michelle Lee">Michelle Lee</a>, <a href="" rel="nofollow" title="Nanna Blondell">Nanna Blondell</a>, <a href="" rel="nofollow" title="O-T Fagbenle">O-T Fagbenle</a></li> --}}
                           <article id="post-38424" class="item-content">
                              <p>{{$movie->title}} &#8211; {{$movie->name_eng}}: {{$movie->description}}</p>
                              <h5>Từ Khoá Tìm Kiếm:</h5>
                              {{-- Chuyển đổi các từ khóa thành links --}}
                              @if($movie->tags != NULL)
                                 @php
                                 // Cho các từ khóa vào 1 mảng
                                 $tags = [];
                                 // Tách từng từ khóa ra bằng dấu phẩy
                                 $tags = explode(',',$movie->tags);
                                 @endphp

                                 @foreach($tags as $key => $tag)
                                    <a href="{{url('tag/'.$tag)}}">{{$tag}}</a>
                                 @endforeach
                              @else
                                 {{$movie->title}}
                              @endif
                           </article>
                        </div>
                     </div>

                     {{-- TRAILER PHIM --}}
                     @if(isset($movie->trailer))
                     <div id="halim_trailer">
                        <div class="section-bar clearfix">
                           <h2 class="section-title"><span style="color:#ffed4d">Trailer</span></h2>
                        </div>
                        <div class="entry-content htmlwrap clearfix">
                           <div class="video-item halim-entry-box">
                              <article id="watch_trailer" class="item-content">
                                 <!-- Chiếu Trailer Youtube -->
                                 <iframe width="100%" height="400" style="color: white; font-size: 20px;" src="https://www.youtube.com/embed/{{$movie->trailer}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>

                              </article>
                           </div>
                        </div>
                     </div>
                     @endif

                     <div class="clearfix"></div>                     

                     {{-- //Comment 
                     <div class="section-bar clearfix">
                        <h2 class="section-title"><span style="color:#ffed4d">Bình luận</span></h2>
                     </div>
                     <div class="entry-content htmlwrap clearfix">
                        @php
                           $current_url = Request::url();
                        @endphp
                        <div class="video-item halim-entry-box">
                           <article id="post-38424" class="item-content">
                              <div style="font-color: white;" class="fb-comments" data-href="{{$current_url}}" data-width="100%" data-numposts="6"></div>
                           </article>
                        </div>
                     </div>
                  </div> --}}

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
<script type="text/javascript">
   function remove_background(movie_id){
      for(var count = 1; count <= 5; count ++){
         $('#'+movie_id+'-'+count).css('color','#ccc');
      }
   }
   // Hover chuột đánh giá sao
   $(document).on('mouseenter', '.rating', function(){
      var index = $(this).data("index");
      var movie_id = $(this).data('movie_id');

      remove_background(movie_id);
      for(var count = 1; count <= index; count++){
         $('#'+movie_id+'-'+count).css('color', '#ffcc00');
      }
   });
   // Nhả chuột không đánh giá
   $(document).on('mouseleave', '.rating', function(){
      var index = $(this).data("index");
      var movie_id = $(this).data('movie_id');
      var rating = $(this).data("rating");
      remove_background(movie_id);

      for(var count = 1; count <= rating; count++){
         $('#'+'movie_id'+'-'+count).css('color', '#ffcc00');
      }
   });

   // Click đánh giá sao
   $(document).on('click', '.rating', function(){
      var index = $(this).data("index");
      var movie_id = $(this).data('movie_id');

      $.ajax({
         url: "{{route('add-rating')}}",
         method: "POST",
         data: {index: index, movie_id: movie_id},
            headers: {
               'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
            },
         success: function(data){
            if(data == 'done'){
               alert("Bạn đã đánh giá " + index + " trên 5 sao!");
               location.reload();
            } else if (data == 'exist') {
               alert("Bạn đã đánh giá phim này trước đó rồi!");
               location.reload();
            } else {
               alert("Có lỗi xảy ra, xin bạn vui lòng đánh giá sau!");
               location.reload();
            }
         }
      });
   });
</script>
@endsection