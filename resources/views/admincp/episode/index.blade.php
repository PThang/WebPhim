
{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <a href="{{route('episode.create')}}" class="btn btn-primary">Thêm tập phim mới</a>
                <div class="card-header">QUẢN LÝ TẬP PHIM</div>                
            </div>
            <table class="table" id="tablePhim">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên phim</th>
                    <th scope="col">Poster phim</th>
                    <th scope="col">Tập phim</th>
                    <th scope="col">Link Phim</th> --}}
                    {{-- <th scope="col">Active/Inactive</th> --}} 
                    {{-- <th scope="col">Quản lý</th>
                  </tr>
                </thead> --}}
                {{-- đặt class: order-position để drag các danh mục bằng sortable --}}
                {{-- <tbody class="order_position"> 
                    @foreach($list_episode as $key => $ep) --}}
                    {{-- trong thẻ tr lấy id của danh mục ra để drag --}}
                    {{-- <tr id="{{$ep->movie->id}}">
                        <th scope="row">{{$key+1}}</th>
                        <td>{{$ep->movie->title}}</td>
                        <td><img width="90px" height="150px" src="{{asset('uploads/movie/'.$ep->movie->image)}}" alt=""></td>
                        <td>{{$ep->episode}}</td> --}}
                        {{-- Lưu ý trong laravel, các thành phần có chứa html cần được đặt trong dấu {!! !!} --}}
                        {{-- còn nếu muốn hiển thị link phim kiểu text thôi thì gõ như bên dưới, web đỡ load video --}}
                        {{-- <td>{{$ep->linkphim}}</td> --}}
                        {{-- <td>
                            {{ $ep->status ? 'Hiển thị' : 'Ẩn' }}
                        </td> --}}
                        {{-- <td>
                            {!! Form::open([
                                'method'=>'DELETE',
                                'route'=>['episode.destroy',$ep->id],
                                'onsubmit'=>'return confirm("Xác nhận xóa?")',
                                'class'=>'d-inline-block'
                            ]) !!}
                            {!! Form::submit('Xóa', ['class'=>'btn btn-danger']) !!}
                            {!! Form::close() !!}
                            <a href="{{route('episode.edit', $ep->id)}}" class="btn btn-warning d-inline-block">Sửa</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection --}}