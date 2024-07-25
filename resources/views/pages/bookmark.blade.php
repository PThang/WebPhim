<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

<!--Table-->
<div id="app">
    <span><a href="{{URL::to('/')}}">QUAY LẠI TRANG CHỦ</a></span>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
        <h3>Bookmark List</h3>
        {{-- In ra thông báo --}}
        @if(Session::has('success'))
            <div id="bookmark-alert" class="alert alert-success" role="alert">
                {{Session::get('success')}}
            </div>
        @elseif(Session::has('error'))
            <div id="bookmark-alert" class="alert alert-danger" role="alert">
                {{Session::get('error')}}
            </div>
            <script>
                // Tự động ẩn thông báo sau 2 giây
                setTimeout(function(){
                document.getElementById('bookmark-alert').style.display = 'none';
                }, 2000);
            </script>
        @endif
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="container">
                <table class="table table-striped w-auto">
                    @if ($bookmarkedMovies->isEmpty())
                        <p>No bookmarked movies.</p>
                    @else
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên Phim</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($bookmarkedMovies as $key => $bm_movie)
                    <tr class="table-info">
                        <th scope="row">{{$key+1}}</th>
                        <td>
                            <a href="{{route('movie',$bm_movie->slug)}}">
                                {{ $bm_movie->title }}
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('delete_bookmark', $bm_movie->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger">Xóa</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                    @endif
                </table>  
            </div>            
        </div>
    </nav>
</div>