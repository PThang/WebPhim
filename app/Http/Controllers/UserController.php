<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function setting_info()
    {
        $user = Auth::user();
        return view('pages.information', compact('user'));
    }
    public function edit_info($id)
    {
        $userId = User::find($id);

        if (!$userId) {
            abort("User invalid");
        }
        return view('pages.information', compact('userId'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_info(Request $request, $id)
    {
        $data = $request->all();
        $userId = User::find($id);
        $userId->name = $data['edit_name'];
        $userId->email = $data['edit_email'];
        $userId->password = Hash::make($data['edit_password']);
        $userId->save();
        Auth::login($userId);
        return redirect()->back()->with('success', 'Thay đổi thông tin thành công!');
    }

    public function log_out()
    {
        Auth::logout();
        return redirect()->to('/');
    }

    public function password_reset(Request $request)
    {
        $data = $request->all();
        $user = User::where('email', $data['reset_email'])->first();
        $user->email = $data['reset_email'];
        $user->password = Hash::make($data['reset_password']);
        $user->save();
        Auth::login($user);
        return redirect()->to('/')->with('success', 'Thay đổi mật khẩu thành công!');
    }
}