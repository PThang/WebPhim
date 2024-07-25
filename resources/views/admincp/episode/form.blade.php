
{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="card card-responsive">
                <a href="{{route('episode.index')}}" class="btn btn-primary">Hiển thị danh sách tập phim</a>
                <div class="card-header">QUẢN LÝ TẬP PHIM</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif --}}
                    <!--Lưu ý bên dưới là form của Laravel Collective: giúp rút gọn code-->
                    {{-- @if(!isset($episode))
                        {!! Form::open(['route'=>'episode.store', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
                    @else
                        {!! Form::open(['route'=>['episode.update', $episode->id], 'method'=>'PUT', 'enctype'=>'multipart/form-data']) !!} 
                    @endif --}}
                    
                    <!--Chọn tên phim để thêm tập phim mới / khi cập nhật thì không được sửa tên phim-->
                        {{-- <div class="form-group">
                            {!! Form::label('movie', 'Chọn Phim', []) !!}
                            {!! Form::select('movie_id', 
                            ['0'=> 'Chọn phim', 'Danh sách phim'=> $list_movie], isset($episode) ? [$episode->movie_id] : '',
                            ['class' => 'form-control select_movie', isset($episode) ? 'readonly' : '']
                            )!!}
                        </div> --}}
                        
                    <!--Link Phim-->
                        {{-- <div class=form-group>
                            {!! Form::label('link', 'Link Phim', []) !!}
                            {!! Form::text('link', isset($episode) ? $episode->linkphim : '',
                                ['class'=>'form-control', 'placeholder'=>'Nhập dữ liệu']) !!}
                        </div> --}}
                    <!--Tập Phim / khi cập nhật thì không được sửa tập phim-->
                        {{-- @if(isset($episode))
                            <div class=form-group>
                                {!! Form::label('episode', 'Tập Phim', []) !!}
                                {!! Form::text('episode', isset($episode) ? $episode->episode : '',
                                    ['class'=>'form-control', isset($episode) ? 'readonly' : '']) !!}
                            </div>
                        @else
                            <div class=form-group>
                                {!! Form::label('episode', 'Tập Phim', []) !!}
                                <select name="episode" class="form-control" id="show_episode"></select>
                            </div>    
                        @endif --}}
                    <!--Submit-->
                        {{-- @if(!isset($episode))
                            {!! Form::submit('Thêm tập phim mới', ['class'=>'btn btn-info']) !!}
                        @else
                            {!! Form::submit('Cập nhật', ['class'=>'btn btn-warning']) !!}
                        @endif
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}