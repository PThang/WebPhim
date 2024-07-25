{{-- CÁC MENU HIỂN THỊ Ở TRANG ADMIN --}}


<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{route('dashboard')}}">TRANG ADMIN</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="{{route('category.create')}}">DANH MỤC PHIM</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="{{route('genre.create')}}">THỂ LOẠI</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="{{route('country.create')}}">QUỐC GIA</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="{{route('movie.index')}}">PHIM</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="{{route('manageUser.create')}}">NGƯỜI DÙNG</a>
        </li>
      </ul>
    </div>
  </nav>

