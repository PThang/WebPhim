{{-- ĐĂNG KÝ TÀI KHOẢN MỚI --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        {{-- TÊN --}}
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                            <div class="col-md-6">
                                <input id="user_name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus onkeyup="validateName()">
                                <p style="color:rgb(163, 36, 17)" id="result1"></p>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- EMAIL --}}
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                            <div class="col-md-6">
                                <input id="user_email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" onkeyup="validateEmail()">
                                <p style="color:rgb(163, 36, 17)" id="result2"></p>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- MẬT KHẨU --}}
                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                            <div class="col-md-6">
                                <input id="user_password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" onkeyup="validatePassword()">
                                <p style="color:rgb(163, 36, 17)" id="result3"></p>

                                {{-- @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
                            </div>
                        </div>

                        {{-- NHẬP LẠI MẬT KHẨU --}}
                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="user_retype_password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" onkeyup="validateRetypePassword()">
                                <p style="color:rgb(163, 36, 17)" id="result4"></p>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                            <div class="col-md-6 offset-md-4">
                                <span>Already have an account?</span>
                                <a href="{{ route('login') }}"><button type="button" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button></a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- JS -->    
{{-- VALIDATE NAME INPUT --}}
{{-- Điều kiện: tên có ít nhất 2 ký tự và không chứa số hoặc ký tự đặc biệt --}}
<script>
    function validateName() {
        var name = document.getElementById("user_name").value;
        var pattern = /^[a-zA-Z\s]+$/;
        var resultElement = document.getElementById("result1");
        
        if (name.length >= 2 && pattern.test(name)) {
        resultElement.innerHTML = "";
        } else {
        resultElement.innerHTML = "Tên cần ít nhất 2 ký tự và không chứa số, ký tự đặc biệt!";
        }
    }
</script>

{{-- VALIDATE EMAIL INPUT --}}
{{-- Check theo pattern --}}
<script>
    function validateEmail() {
        var email = document.getElementById("user_email").value;
        var pattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,})+$/;
        var resultElement = document.getElementById("result2");
        
        if (pattern.test(email)) {
        resultElement.innerHTML = "";
        } else {
        resultElement.innerHTML = "Email không hợp lệ!";
        }
    }
</script>

{{-- VALIDATE PASSWORD INPUT --}}
{{-- Mật khẩu cần dài ít nhất 8 ký tự và có 1 ký tự in hoa --}}
<script>
    function validatePassword() {
    var password = document.getElementById("user_password").value;
    var uppercaseRegex = /[A-Z]/;
    var resultElement = document.getElementById("result3");
    
    if (password.length >= 8 && uppercaseRegex.test(password)) {
        resultElement.innerHTML = "";
    } else {
        resultElement.innerHTML = "Mật khẩu cần từ 8 ký tự và có 1 ký tự hoa!";
    }
    }
</script>

{{-- VALIDATE RETYPE PASSWORD --}}
{{-- Mật khẩu nhập lại cần phải giống như mật khẩu ban đầu --}}
<script>
    function validateRetypePassword() {
    var password = document.getElementById("user_password").value;
    var retypePassword = document.getElementById("user_retype_password").value;
    var passwordMatchElement = document.getElementById("result4");
    
    if (password === retypePassword) {
        passwordMatchElement.innerHTML = "";
    } else {
        passwordMatchElement.innerHTML = "Mật khẩu không khớp!";
    }
    }
</script>
