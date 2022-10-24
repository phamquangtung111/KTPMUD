<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ControllerLogin extends Controller
{
    public function getloginAdmin()
    {
        return view('login.adminlogin');
    }

    public function Adminlogin(Request $request)
    {
        $this->validate($request,
            [
                'username'=> 'required',
                'password' => 'required',
            ],
            [
                'required' => ':attribute không được để trống',
            ],
            [
                'username' => 'Username',
                'password' => 'Password',
            ]);

        $username = $request['username'];
        $password = $request['password'];
        if(Auth::attempt(['name' => $username, 'password' => $password]))
        {
            Session::put('username',$username);
            //Check status
            $is_active = User::where('name',$username)->first()->is_active;
            if($is_active == true) {
                return redirect()->route('home');
            }
            else
            {
                return redirect('admin/login')->with('notification', 'Tài khoản hiện đang bị khóa');
            }
        }
        else
        {
            return redirect('admin/login')->with('notification', 'Tên đăng nhập hoặc mật khẩu không đúng');
        }
    }

    public function logout()
    {
        Session::forget('username');
        Auth::logout();
        return redirect('/');
    }
}
