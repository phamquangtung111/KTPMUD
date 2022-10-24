<?php

namespace App\Http\Controllers;

use App\User;
use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class ControllerAdmin extends Controller
{
    public function index()
    {
        $session = Session::get('username');
        if(!empty($session)) {
            return view('admin.index');
        } else {
            return redirect('/');
        }
    }
    public function AllUsers() {
        $session = Session::get('username');
        if(!empty($session)) {
            $data = User::all();
            return view('admin.manage.account', ['data' => $data]);
        } else {
            return redirect('/');
        }

    }
    public function viewNewAccount() {
        $session = Session::get('username');
        if(!empty($session)) {
            return view('admin.create.account');
        } else {
            return redirect('/');
        }
    }
    public function saveAccount(Request $request) {
        $session = Session::get('username');
        if(!empty($session)) {
            //Data Request
            $user = new User();

            $username = $request->name;
            $password = bcrypt($request->password);
            $email = $request->email;
            $user->name = $username;
            $user->password = $password;
            $user->diachi = $request->diachi;
            $user->role = $request->role;
            $user->tennv = $request->tennv;
            $user->email = $email;
            try {
                $user->save();
                return redirect('admin/account')->with('notification', 'Thêm mới tài khoản thành công');

            } catch (\Exception $e) {
                return redirect('admin/account/new')->with('notification', $e->getMessage());
            }
        } else {
            return redirect('/');
        }
    }
    public function editAccount(string $id){
        $session = Session::get('username');
        if(!empty($session)) {
            $data = User::find($id);
            return view('admin.edit.account', ['data' => $data]);
        } else {
            return redirect('/');
        }
    }
    public function updateAccount(Request $request){
        $session = Session::get('username');
        if(!empty($session)) {
            $user = User::find($request->id);
            if ($user->password != $request->password) {
                $password = bcrypt($request->password);
                $user->password = $password;
            }
            if($request->is_active == 'on') {
                $user->is_active = 1;
            } else{
                $user->is_active = 0;
            }
            $user->name = $request->name;
            $user->diachi = $request->diachi;
            $user->role = $request->role;
            $user->tennv = $request->tennv;
            $user->email = $request->email;
            try {
                $user->save();
                return redirect('admin/account')->with('notification', 'Sửa tài khoản thành công');

            } catch (\Exception $e) {
                return redirect('admin/account')->with('notification', $e->getMessage());
            }
        } else {
            return redirect('/');
        }
    }
    public function deleteByKey($key, $id){
        $session = Session::get('username');
        if(!empty($session)) {
            switch ($key) {
                case 'delete_user' :
                    User::where('id', $id)->delete();
                    return redirect('admin/account')->with('notification', 'Xóa thành công');
                case 'delete_employee' :
                    Employee::where('id', $id)->delete();
                    return redirect('admin/employee')->with('notification', 'Xóa thành công');
                default :
                    return null;
            }
        } else {
            return redirect('/');
        }
    }
}
