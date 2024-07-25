<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

<!--Table-->
<div class="container">
  <button type="button" class="btn btn-warning"><a style="text-decoration: none; font-weight: bold;" href="{{URL::to('/')}}">Quay lại trang chủ</a></button>
    <h2>Thông tin người dùng</h2>
    <table class="table table-striped w-auto">

      @if(Session::has('success'))
                        <div id="welcome-alert" class="alert alert-success" role="alert">
                           {{Session::get('success')}}
                        </div>
                        <script>
                           // Tự động ẩn thông báo sau 2 giây
                           setTimeout(function(){
                              document.getElementById('welcome-alert').style.display = 'none';
                           }, 2000);
                        </script>
                     @endif
    <!--Table head-->
    <thead>
      <tr>
        <th>#</th>
        <th>Tên</th>
        <th>Email</th>
        <th>Password</th>
      </tr>
    </thead>
    <!--Table head-->
  
    <!--Table body-->
    <tbody>
      <tr class="table-info">
        <th scope="row">1</th>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>
          <span class="password-placeholder">*******</span>
          <span class="password-original" style="display: none;">{{ $user->password }}</span>
          <button class="show-password-btn" onclick="showPassword(this)">Hiển thị</button>
          <button class="hide-password-btn" style="display: none;" onclick="hidePassword(this)">Ẩn</button>
        </td>
      </tr>
      
    </tbody>
    <!--Table body-->
  
  
  </table>
  <!--Table-->

  <div class="card-body">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

        <form action="{{route('update_information', $user->id)}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Chỉnh Sửa Tên</label>
                <input type="text" class="form-control" id="name" name="edit_name" value="{{ isset($user) ? $user->name : '' }}" placeholder="Nhập tên">
            </div>
            
            <div class="form-group">
                <label for="email">Chỉnh Sửa Email</label>
                <input type="email" class="form-control" id="email" name="edit_email" value="{{ isset($user) ? $user->email : '' }}" placeholder="Nhập email">
            </div>
            
            <div class="form-group">
                <label for="password">Chỉnh Sửa Mật khẩu</label>
                <input type="password" class="form-control" id="password" name="edit_password" placeholder="Nhập mật khẩu">
            </div>
    
            <button type="submit" class="btn btn-success">Cập nhật</button>
        </form>
</div>

{{-- Ẩn/ Hiển thị mật khẩu --}}
<script>
  function showPassword(button) {
      var passwordPlaceholder = button.parentNode.querySelector('.password-placeholder');
      var passwordOriginal = button.parentNode.querySelector('.password-original');
      var hideButton = button.parentNode.querySelector('.hide-password-btn');

      passwordPlaceholder.textContent = passwordOriginal.textContent;
      passwordPlaceholder.style.display = 'inline';
      passwordOriginal.style.display = 'none';

      button.style.display = 'none';
      hideButton.style.display = 'inline';
  }

  function hidePassword(button) {
      var passwordPlaceholder = button.parentNode.querySelector('.password-placeholder');
      var passwordOriginal = button.parentNode.querySelector('.password-original');
      var showButton = button.parentNode.querySelector('.show-password-btn');

      passwordPlaceholder.textContent = '*******';
      passwordPlaceholder.style.display = 'inline';
      passwordOriginal.style.display = 'none';

      button.style.display = 'none';
      showButton.style.display = 'inline';
  }
</script>


