
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{$movie->title}}</div>                
            </div>
            {{-- In ra thông báo --}}
            @if(Session::has('success'))
                <div id="login-alert" class="alert alert-success" role="alert">
                    {{Session::get('success')}}
                </div>
            @elseif(Session::has('error'))
                <div id="login-alert" class="alert alert-danger" role="alert">
                    {{Session::get('error')}}
                </div>
                <script>
                    // Tự động ẩn thông báo sau 3 giây
                    setTimeout(function(){
                    document.getElementById('login-alert').style.display = 'none';
                    }, 4000);
                </script>
            @endif
                <div class="card card-responsive">    
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <!--Laravel Collective-->
                        @if(!isset($episode))
                            {!! Form::open(['route'=>'episode.store', 'method'=>'POST', 'enctype'=>'multipart/form-data', 'files' => true]) !!}
                        @else
                            {!! Form::open(['route'=>['episode.update', $episode->id], 'method'=>'PUT', 'enctype'=>'multipart/form-data', 'files' => true]) !!} 
                        @endif

                        {{-- Tên phim  --}}
                            <div class=form-group>
                                {!! Form::label('movie_title', 'Tên Phim', []) !!}
                                {!! Form::text('movie_title', isset($movie) ? $movie->title : '',
                                    ['class'=>'form-control', 'readonly']) !!}
                                {!! Form::hidden('movie_id', isset($movie) ? $movie->id : '') !!}
                            </div>
                        {{-- Video tải lên từ máy tính --}}
                            <div class=form-group>
                                {!! Form::label('linkphim720', 'Tải video', []) !!}
                                {!! Form::file('linkphim720', ['class'=>'form-control', 'placeholder'=>'Chọn video từ máy tính']) !!}
                            </div>
                        {{-- Link phim --}}  
                            {{-- <div class="form-group">
                                {!! Form::label('link', 'Link Phim', []) !!}
                                {!! Form::text('link', isset($episode) ? $episode->linkphim720 : '', ['class'=>'form-control','placeholder'=>'...']) !!}
                            </div> --}}
                        {{-- Tập Phim / khi cập nhật thì không được sửa tập phim --}}
                            @if(isset($episode))
                                <div class=form-group>i
                                    {!! Form::label('episode', 'Tập Phim', []) !!}
                                    {!! Form::text('episode', isset($episode) ? $episode->episode : '',
                                        ['class'=>'form-control', isset($episode) ? 'readonly' : '']) !!}
                                </div>                                
                            @else
                                <div class=form-group>
                                    {!! Form::label('episode', 'Tập Phim', []) !!}
                                    {!! Form::selectRange('episode', 1, $movie->sotap, $movie->sotap, ['class'=>'form-control']) !!}
                                </div>                                 
                            @endif
                        {{-- Submit --}}
                            @if(!isset($episode))
                                {!! Form::submit('Thêm tập phim mới', ['class'=>'btn btn-info']) !!}
                            @else
                                {!! Form::submit('Cập nhật', ['class'=>'btn btn-warning']) !!}
                            @endif
                        {!! Form::close() !!}
                    </div>
                </div>

            {{-- LIỆT KÊ DANH SÁCH CÁC TẬP PHIM --}}
            <table class="table" id="tablePhim">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên phim</th>
                    <th scope="col">Poster phim</th>
                    <th scope="col">Tập phim</th>
                    <th scope="col">Link phim</th>
                    {{-- <th scope="col">Active/Inactive</th> --}} 
                    <th scope="col">Quản lý</th>
                  </tr>
                </thead>
                {{-- order-position: drag các danh mục bằng sortable --}}
                <tbody class="order_position"> 
                    @foreach($list_episode as $key => $ep)
                    {{-- trong thẻ tr lấy id của danh mục ra để drag --}}
                    <tr id="{{$ep->movie->id}}">
                        <th scope="row">{{$key+1}}</th>
                        <td>{{$ep->movie->title}}</td>
                        <td><img width="90px" height="150px" src="{{asset('uploads/movie/'.$ep->movie->image)}}" alt=""></td>
                        <td>{{$ep->episode}}</td>
                        <td>{{$ep->linkphim720}}</td>
                        {{-- <td>
                            {{ $ep->status ? 'Hiển thị' : 'Ẩn' }}
                        </td> --}}
                        <td>
                            {!! Form::open([
                                'method'=>'DELETE',
                                'route'=>['episode.destroy',$ep->id],
                                'onsubmit'=>'return confirm("Xác nhận xóa?")',
                                'class'=>'d-inline-block'
                            ]) !!}
                            {!! Form::submit('Xóa', ['class'=>'btn btn-danger']) !!}
                            {!! Form::close() !!}
                            {{-- <a href="{{route('episode.edit', $ep->id)}}" class="btn btn-warning d-inline-block">Sửa</a> --}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection