
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-14">
            <div class="card">
                <div class="card-header">QUẢN LÝ THỂ LOẠI</div>
                <a href="{{route('genre.create')}}" class="btn btn-primary">Thêm thể loại</a>
                <div class="card-body">
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
                    <!--Laravel Collective-->
                    @if(!isset($genre))
                        {!! Form::open(['route'=>'genre.store', 'method'=>'POST']) !!}
                    @else
                        {!! Form::open(['route'=>['genre.update', $genre->id], 'method'=>'PUT']) !!} 
                    @endif
                        <div class=form-group>
                            {!! Form::label('title', 'Title', []) !!}
                            {!! Form::text(
                                'title', 
                                isset($genre) ? $genre->title : '',
                                ['class'=>'form-control', 'placeholder'=>'Nhập dữ liệu',
                                'id'=>'slug', 'onkeyup'=>'ChangeToSlug()']) !!}
                        </div>
                        <div class=form-group>
                            {!! Form::label('slug', 'Slug', []) !!}
                            {!! Form::text(
                                'slug', 
                                isset($genre) ? $genre->slug : '',
                                ['class'=>'form-control', 'placeholder'=>'Nhập dữ liệu',
                                'id'=>'convert_slug']) !!}
                        </div>
                        <div class=form-group>
                            {!! Form::label('description', 'Description', []) !!}
                            {!! Form::textarea(
                            'description',
                            isset($genre) ? $genre->description : '',
                            ['style'=>'resize:none','class'=>'form-control',
                            'placeholder'=>'Nhập dữ liệu',
                            'id'=>'description']) !!}
                        </div>
                        <div class=form-group>
                            {!! Form::label('active', 'Active', []) !!}
                            {!! Form::select('status',
                            ['1'=>'Hiển thị', '0'=>'Ẩn'],isset($genre) ? $genre->status : 'Hiển thị',
                            ['class'=>'form-control']) !!}
                        </div>

                        @if(!isset($genre))
                            {!! Form::submit('Thêm dữ liệu', ['class'=>'btn btn-info']) !!}
                        @else
                            {!! Form::submit('Cập nhật', ['class'=>'btn btn-info']) !!}
                        @endif
                    {!! Form::close() !!}
                </div>
            </div>
            <table class="table" id="tablePhim">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Active/Inactive</th>
                    <th scope="col">Manage</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($list as $key => $cate)
                    <tr>
                        <th scope="row">{{$key+1}}</th>
                        <td>{{$cate->title}}</td>
                        <td>{{$cate->description}}</td>
                        <td>{{$cate->slug}}</td>
                        <td>
                            {{ $cate->status ? 'Hiển thị' : 'Ẩn' }}
                        </td>
                        <td>
                            {!! Form::open([
                                'method'=>'DELETE',
                                'route'=>['genre.destroy',$cate->id],
                                'onsubmit'=>'return confirm("Xác nhận xóa?")',
                                'class'=>'d-inline-block'
                            ]) !!}
                            {!! Form::submit('Xóa', ['class'=>'btn btn-danger']) !!}
                            {!! Form::close() !!}
                            <a href="{{route('genre.edit', $cate->id)}}" class="btn btn-warning d-inline-block">Sửa</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection