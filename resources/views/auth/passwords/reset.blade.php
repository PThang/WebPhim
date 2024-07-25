{{-- TRANG RESET PASSWORD --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password_reset') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="user_email" type="email" class="form-control @error('email') is-invalid @enderror" name="reset_email" value="{{ $email ?? old('email') }}" required autocomplete="email" readonly>

                                {{-- <input id="user_email" type="email" class="form-control @error('email') is-invalid @enderror" name="reset_email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus onkeyup="validateEmail()">
                                <p style="color:rgb(163, 36, 17)" id="result2"></p> --}}

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="user_password" type="password" class="form-control @error('password') is-invalid @enderror" name="reset_password" required autocomplete="new-password" onkeyup="validatePassword()">
                                <p style="color:rgb(163, 36, 17)" id="result3"></p>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

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
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- VALIDATE EMAIL INPUT --}}
{{-- Check theo pattern --}}
<script>
    function validateEmail() {
        var email = document.getElementById("user_email").value;
        var pattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,})+$/;
        var resultElement = document.getElementById("result2");
        
        if (pattern.test(email) && email.value !="") {
        resultElement.innerHTML = "";
        } else {
        resultElement.innerHTML = "Email không hợp lệ!";
        }
    }
</script>
{{-- VALIDATE PASSWORD INPUT --}}
{{-- Mật khẩu cần dài ít nhất 6 ký tự và có 1 ký tự in hoa --}}
<script>
    function validatePassword() {
    var password = document.getElementById("user_password").value;
    var uppercaseRegex = /[A-Z]/;
    var resultElement = document.getElementById("result3");
    
    if (password.length >= 8 && uppercaseRegex.test(password) && password.value !="") {
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