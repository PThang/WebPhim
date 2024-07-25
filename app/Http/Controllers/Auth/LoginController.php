<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    // protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function log_in_post(Request $request)
    {
        $check_data = [
            'email' => $request->login_email,
            'password' => $request->login_password,
        ];
        // $hashedPassword = Hash::make($request->login_password); //tạo chuối mã hóa mật khẩu gốc
        // if (Hash::check($password, $hashedPassword)) { //Hash::check sẽ kiểm tra tính trùng khớp
        // Mật khẩu khớp
        // $originalPassword = $password;
        // } else {
        // Mật khẩu không khớp
        // Xử lý thông báo lỗi hoặc logic khác
        // }
        if (Auth::attempt($check_data)) {
            // Xác thực thành công
            // Kiểm tra vai trò xem là role 1 (Admin) hay role 2 (User)
            // Mặc định khi tạo tài khoản sẽ setting là role 2
            // Chỉ có admin mới có quyền thay đổi role
            $user = Auth::user();

            if ($user->role == 1 && $user->status == 1) {
                Auth::login($user);
                return redirect()->to('/dashboard')->with('success', 'Welcome back ' . $user->name . '!');
            } elseif ($user->role == 2 && $user->status == 1) {
                Auth::login($user);
                return redirect()->to('/')->with('success', 'Welcome back ' . $user->name . '!');
            } elseif ($user->status == 0) {
                return back()->with('error', 'This account is inactive!');
            }
        }
        return back()->with('error', 'Wrong Email or Password!');
    }


}