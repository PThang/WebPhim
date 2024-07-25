
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card"> 
                <div class="card-header">DANH SÁCH TẤT CẢ PHIM <a href="{{route('movie.create')}}" class="btn btn-primary" style="float:right" >Thêm phim mới</a></div>
            </div>
            {{-- In ra thông báo --}}
            @if(Session::has('success'))
                <div id="movie-index-alert" class="alert alert-success" role="alert">
                    {{Session::get('success')}}
                </div>
            @elseif(Session::has('error'))
                <div id="movie-index-alert" class="alert alert-danger" role="alert">
                    {{Session::get('error')}}
                </div>
                <script>
                    // Tự động ẩn thông báo sau 3 giây
                    setTimeout(function(){
                    document.getElementById('movie-index-alert').style.display = 'none';
                    }, 4000);
                </script>
            @endif
            <table class="table table-responsive" id="tablePhim">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">English Name</th>
                    <th scope="col">Image</th>
                    <th scope="col">Description</th>
                    <th scope="col">Trailer</th>
                    <th scope="col">Season</th>
                    <th scope="col">Tags</th>
                    <th scope="col">Duration</th>
                    <th scope="col">Resolution</th>
                    <th scope="col">Subtitle</th>
                    <th scope="col">Số Tập</th>
                    <th scope="col">Slug</th>
                    <th scope="col">HOT</th>
                    <th scope="col">Top Views</th>
                    <th scope="col">Active/Inactive</th>
                    <th scope="col">Created Date</th>
                    <th scope="col">Updated Date</th>
                    <th scope="col">Release Year</th>
                    <th scope="col">Category</th>
                    <th scope="col">Thuộc phim lẻ hay phim bộ</th>
                    <th scope="col">Genre</th>
                    <th scope="col">Country</th>
                    <th scope="col">Manage</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($list as $key => $mov)
                    <tr>
                    {{-- Số thứ tự --}}
                        <th scope="row">{{$key+1}}</th>
                    {{-- Tên phim --}}
                        <td>{{$mov->title}}</td>
                    {{-- Tên tiếng Anh của phim --}}
                        <td>{{$mov->name_eng}}</td>
                    {{-- Poster của phim --}}
                        <td><img width="70px" src="{{asset('uploads/movie/'.$mov->image)}}" alt=""></td>
                    {{-- Mô tả phim --}}
                        <td>
                            @if($mov->description!=NULL)
                                {{substr($mov->description,0,10)}}...
                            @else
                                Chưa có mô tả phim 
                            @endif
                        </td>
                    {{-- Trailer phim --}}
                        <td>
                            @if($mov->trailer!=NULL)
                                {{substr($mov->trailer,0,20)}}...
                            @else
                                Chưa có trailer phim 
                            @endif
                        </td>
                    {{-- Season phim --}}
                        <td>
                            {!! Form::selectRange('season', 0, 20, isset($mov->season) ? $mov->season : '', ['class'=>'select_season', 'id'=>$mov->id]) !!}
                        </td> 
                    {{-- Tags phim --}}
                        <td>
                            @if($mov->tags!=NULL)
                                {{substr($mov->tags,0,30)}}...
                            @else
                                Chưa có tags phim 
                            @endif
                        </td>
                    {{-- Thời lượng phim --}}
                        <td>{{$mov->thoi_luong}}</td>
                    {{-- Chất lượng phim --}}
                        <td>
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
                        </td>
                    {{-- Phụ đề hay thuyết minh --}}
                        <td>
                            {{ $mov->phude ? 'Thuyết Minh' : 'Vietsub' }}
                        </td>
                    {{-- Số Tập của Phim --}}
                        <td>
                            @if($mov->thuocphim=='phimle')
                                {{$mov->episode_count}}<br>
                                <a href="{{route('add-episode', [$mov->id])}}" class="btn-sm btn btn-info">Thêm/Sửa tập phim </a>
                            @else
                                {{$mov->episode_count}}/{{$mov->sotap}}<br><a href="{{route('add-episode', [$mov->id])}}" class="btn-sm btn btn-info">Thêm/Sửa tập phim </a>                           
                            @endif
                        </td>
                    {{-- Đường dẫn tìm kiếm --}}
                        <td>{{$mov->slug}}</td>
                    {{-- Phim HOT hiển thị ở slider đầu website --}}
                        <td>
                            {{ $mov->phim_hot ? 'Có' : 'Không' }}
                        </td>
                    {{-- Top Views --}}
                        <td> 
                            {!! Form::select('topview',
                            ['0'=>'Ngày', '1'=>'Tuần', '2'=>'Tháng'],isset($mov->topview) ? $mov->topview : '',
                            ['class'=>'select_topview','id'=>$mov->id]) !!}
                        </td>
                    {{-- Status Hiển Thị hoặc Ẩn --}}
                        <td>
                            {{ $mov->status ? 'Hiển thị' : 'Ẩn' }}
                        </td>
                    {{-- Ngày tạo --}}
                        <td>{{$mov->ngay_tao}}</td>
                    {{-- Ngày cập nhật --}}
                        <td>{{$mov->ngay_cap_nhat}}</td>
                    {{-- Năm phát hành --}}
                        <td>
                            {!! Form::selectYear('year', 1980, 2024, isset($mov->year) ? $mov->year : '', ['class'=>'select_year', 'id'=>$mov->id]) !!}
                        </td>                    
                    {{-- Thuộc Danh Mục nào --}}
                        <td>
                            {!! Form::select('category_id', $category,
                            isset($mov) ? $mov->category->id : '',
                            ['class'=>'category_choose', 'id' => $mov->id]) !!}
                        </td>
                        
                    {{-- Thuộc phim lẻ hay phim bộ --}}
                        <td>
                            @if($mov->thuocphim=='phimle')
                                Phim Lẻ
                            @else
                                Phim Bộ
                            
                            @endif
                        </td>
                    {{-- Thuộc Những Thể Loại nào --}}
                        <td>
                            @foreach($mov->movie_genre as $gen)
                                <span class="badge badge-dark">{{$gen->title}}</span>
                            @endforeach
                        </td>

                    {{-- Thuộc Quốc Gia nào? --}}
                        <td>
                            {!! Form::select('country_id', $country,
                            isset($mov) ? $mov->country->id : '',
                            ['class'=>'country_choose', 'id' => $mov->id]) !!}
                        </td>
                    {{-- 2 nút chức năng: Sửa và Xóa --}}
                        <td>
                            {!! Form::open([
                                'method'=>'DELETE',
                                'route'=>['movie.destroy',$mov->id],
                                'onsubmit'=>'return confirm("Xác nhận xóa?")',
                                'class'=>'d-inline-block'
                            ]) !!}
                            {!! Form::submit('Xóa', ['class'=>'btn btn-danger']) !!}
                            {!! Form::close() !!}
                            <a href="{{route('movie.edit', $mov->id)}}" class="btn btn-warning d-inline-block">Sửa</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>

@endsection