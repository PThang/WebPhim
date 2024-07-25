<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ManageUserController extends Controller
{
    public function create()
    {
        $list = User::all(); //lấy tất cả dữ liệu ra
        return view('admincp.user.form', compact('list')); //thực hiện gửi list danh sách vào country form
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->role = $data['role'];
        $user->save(); //Lưu vào bảng users trong DB
        return redirect()->back(); //quay trở về trang trước đó
    }

    public function edit($id)
    {
        $user = User::find($id);
        $list = User::all(); //lấy tất cả dữ liệu ra
        // Kiểm tra mật khẩu nguyên bản
        if (Hash::check('password', $user->password)) {
            // Mật khẩu khớp
            $plainPassword = 'password';
        } else {
            // Mật khẩu không khớp
            $plainPassword = null;
        }
        // Hiển thị mật khẩu nguyên bản
        echo $plainPassword;
        if (!$user) {
            abort(404);
        }
        return view('admincp.user.form', compact('list', 'user', 'plainPassword')); //gửi list vào user form
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $user = User::find($id);
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->role = $data['role'];
        $user->save(); //Lưu vào bảng users trong DB
        return redirect()->back(); //quay trở về trang trước đó
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->back(); //quay trở về trang trước đó
    }
}