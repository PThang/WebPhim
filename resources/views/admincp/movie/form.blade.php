
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-14">
            <div class="card">
                <a href="{{route('movie.index')}}" class="btn btn-primary">Hiển thị tất cả phim</a>
                <div class="card-header">QUẢN LÝ CHI TIẾT PHIM</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <!--Laravel Collective-->
                    @if(!isset($movie))
                        {!! Form::open(['route'=>'movie.store', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
                    @else
                        {!! Form::open(['route'=>['movie.update', $movie->id], 'method'=>'PUT', 'enctype'=>'multipart/form-data']) !!} 
                    @endif
                    <!--Nhập tên phim-->
                        <div class=form-group>
                            {!! Form::label('title', 'Title', []) !!}
                            {!! Form::text(
                                'title', 
                                isset($movie) ? $movie->title : '',
                                ['class'=>'form-control', 'placeholder'=>'Nhập dữ liệu',
                                'id'=>'slug', 'onkeyup'=>'ChangeToSlug()']) !!}
                        </div>
                    <!--Nhập tên tiếng Anh của phim-->
                        <div class=form-group>
                            {!! Form::label('engName', 'English Name', []) !!}
                            {!! Form::text(
                                'name_eng', 
                                isset($movie) ? $movie->name_eng : '',
                                ['class'=>'form-control', 'placeholder'=>'Nhập dữ liệu']) !!}
                        </div>
                    <!--Slug của phim được tự động tạo ra hoặc tự nhập-->
                        <div class=form-group>
                            {!! Form::label('slug', 'Slug', []) !!}
                            {!! Form::text(
                                'slug', 
                                isset($movie) ? $movie->slug : '',
                                ['class'=>'form-control', 'placeholder'=>'Nhập dữ liệu',
                                'id'=>'convert_slug']) !!}
                        </div>
                    <!--Season phim--> 
                        <div class=form-group>
                            {!! Form::label('season', 'Season', []) !!}
                            {!! Form::selectRange('season', 0, 20, isset($movie) ? $movie->season : '', ['class'=>'select_season']) !!}
                        </div>
                    <!--Nhập mô tả phim-->
                        <div class=form-group>
                            {!! Form::label('description', 'Description', []) !!}
                            {!! Form::textarea(
                            'description',
                            isset($movie) ? $movie->description : '',
                            ['style'=>'resize:none','class'=>'form-control',
                            'placeholder'=>'Nhập dữ liệu',
                            'id'=>'description']) !!}
                        </div>
                    <!--Nhập video trailer phim-->
                        <div class=form-group>
                            {!! Form::label('trailer', 'Trailer', []) !!}
                            {!! Form::text(
                                'trailer', 
                                isset($movie) ? $movie->trailer : '',
                                ['class'=>'form-control', 'placeholder'=>'Nhập dữ liệu']) !!}
                        </div>
                    <!--Nhập từ khóa tags phim-->
                        <div class=form-group>
                            {!! Form::label('tags', 'Tags', []) !!}
                            {!! Form::textarea(
                            'tags',
                            isset($movie) ? $movie->tags : '',
                            ['style'=>'resize:none','class'=>'form-control',
                            'placeholder'=>'Nhập từ khóa phim',
                            'id'=>'tags']) !!}
                        </div>
                    <!--Nhập thời lượng phim-->
                        <div class=form-group>
                            {!! Form::label('thoi_luong', 'Duration', []) !!}
                            {!! Form::text(
                                'thoi_luong', 
                                isset($movie) ? $movie->thoi_luong : '',
                                ['class'=>'form-control', 'placeholder'=>'Nhập thời lượng phim']) !!}
                        </div>
                    <!--Chọn chất lượng phim-->
                        <div class=form-group>
                            {!! Form::label('resolution', 'Resolution', []) !!}
                            {!! Form::select('resolution',
                            ['0'=>'720p', '1'=>'1080p', '2'=>'HD+', '3'=>'UHD', '4'=>'4K', '5'=>'Trailer'],isset($movie) ? $movie->resolution : '720p',
                            ['class'=>'form-control']) !!}
                        </div>
                    <!--Chọn Thuyết Minh hay Phụ Đề-->
                        <div class=form-group>
                            {!! Form::label('phude', 'Voiceover - Subtitle', []) !!}
                            {!! Form::select('phude',
                            ['1'=>'Thuyết Minh', '0'=>'Vietsub'],isset($movie) ? $movie->phude : 'Đang cập nhật',
                            ['class'=>'form-control']) !!}
                        </div>
                    <!--Số Tập của Phim-->
                        <div class=form-group>
                            {!! Form::label('sotap', 'Số Tập Phim', []) !!}
                            {!! Form::select('sotap', range(0, 1000), isset($movie) ? $movie->sotap : '', ['class'=>'select_year']) !!}
                        </div>
                    <!--Chọn trạng thái (1): hiển thị hoặc (0): ẩn-->
                        <div class=form-group>
                            {!! Form::label('active', 'Active', []) !!}
                            {!! Form::select('status',
                            ['1'=>'Hiển thị', '0'=>'Ẩn'],isset($movie) ? $movie->status : 'Hiển thị',
                            ['class'=>'form-control']) !!}
                        </div>
                    <!-- Năm phát hành phim -->
                        <div class=form-group>
                            {!! Form::label('year', 'Release Year', []) !!}
                            {!! Form::selectYear('year', 1980, 2024, isset($movie) ? $movie->year : '', ['class'=>'select_year']) !!}
                        </div> 
                    <!--Phim thuộc danh mục nào?-->
                        <div class=form-group>
                            {!! Form::label('category', 'Category', []) !!}
                            {!! Form::select('category_id', $category,
                            isset($movie) ? $movie->category_id : '',
                            ['class'=>'form-control']) !!}
                        </div>
                    <!--Thuộc phim lẻ hay phim bộ-->
                    <div class=form-group>
                        {!! Form::label('thuocphim', 'Thuộc phim lẻ hay bộ?', []) !!}
                        {!! Form::select('thuocphim', ['phimle'=>'Phim Lẻ', 'phimbo'=>'Phim Bộ'], isset($movie) ? $movie->thuocphim : '',
                            ['class'=>'form-control']) !!}
                    </div>
                    <!--Phim thuộc quốc gia nào-->
                        <div class=form-group>
                            {!! Form::label('country', 'Country', []) !!}
                            {!! Form::select('country_id', $country,
                            isset($movie) ? $movie->country_id : '',
                            ['class'=>'form-control']) !!}
                        </div>
                    <!--Phim thuộc thể loại nào-->
                        <div class=form-group>
                            {!! Form::label('genre', 'Genre', []) !!}
                            <br>
                            
                            @foreach($list_genre as $key => $gen)
                            @if(isset($movie))
                                {!! Form::checkbox('genre[]', $gen->id, isset($movie_genre) && $movie_genre->contains($gen->id) ? true : false ) !!}
                            @else
                                {!! Form::checkbox('genre[]', $gen->id, '') !!}
                            @endif
                            {!! Form::label('genre', $gen->title) !!}
                            @endforeach

                        </div>
                    <!--Phim HOT hiển thị đầu trang hay không-->
                        <div class=form-group>
                            {!! Form::label('hot', 'Hot', []) !!}
                            {!! Form::select('phim_hot', ['1'=>'Có', '0'=>'Không'],isset($movie) ? $movie->phim_hot : '',
                            ['class'=>'form-control']) !!}
                        </div>
                    <!--Ảnh của phim-->
                        <div class=form-group>                            

                            @if(isset($movie))
                                <span>Poster phim hiện tại</span><br>
                                <img width="80px" src="{{asset('uploads/movie/'.$movie->image)}}" alt=""><br>
                                <span>Bạn có muốn đổi poster khác không?</span><br>
                                <input type="file" name="image" onchange="previewFile(this)" required class="form-control image-preview">
                                <img id="previewImg" width="80px" src=""><br>
                            @else
                                {!! Form::label('image', 'Image', []) !!}
                                <input type="file" name="image" onchange="previewFile(this)" required class="form-control image-preview">
                                <img id="previewImg" width="80px" src=""><br>
                            @endif
                        </div>
                        {{-- Preview hình ảnh trước khi upload hoặc edit --}}
                        <script type="text/javascript">
                            function previewFile(input){
                                var file = $(".image-preview").get(0).files[0];
                                if(file){
                                    var reader = new FileReader();
                                    reader.onload = function(){
                                        $("#previewImg").attr("src", reader.result);
                                    }
                                    reader.readAsDataURL(file);
                                }
                            }
                        </script>
                    <!--Submit-->
                        @if(!isset($movie))
                            {!! Form::submit('Thêm dữ liệu', ['class'=>'btn btn-info']) !!}
                        @else
                            {!! Form::submit('Cập nhật', ['class'=>'btn btn-warning']) !!}
                        @endif
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection