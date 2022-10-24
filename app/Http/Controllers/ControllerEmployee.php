<?php

namespace App\Http\Controllers;

use App\User;
use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ControllerEmployee extends Controller
{
    public function AllEmployees() {
        $session = Session::get('username');
        if(!empty($session)) {
            $data = Employee::all();
            return view('admin.manage.employee', ['data' => $data]);
        } else {
            return redirect('/');
        }

    }
    public function viewNewEmployee() {
        $session = Session::get('username');
        if(!empty($session)) {
            return view('admin.create.employee');
        } else {
            return redirect('/');
        }
    }
    public function saveEmployee(Request $request) {
        $session = Session::get('username');
        if(!empty($session)) {
            //Data Request
            $employee = new Employee();

            $employee->tennv = $request->tennv;
            $employee->diachi = $request->diachi;
            $employee->manv = $request->manv;
            $employee->gioitinh = $request->gioitinh;
            $employee->ngaysinh = $request->ngaysinh;
            $employee->cmnd = $request->cmnd;
            $employee->sdt = $request->sdt;
            $employee->macv = $request->macv;
            $employee->mapb = $request->mapb;
            try {
                $employee->save();
                return redirect('admin/employee')->with('notification', 'Thêm mới thành công');

            } catch (\Exception $e) {
                return redirect('admin/employee/new')->with('notification', $e->getMessage());
            }
        } else {
            return redirect('/');
        }
    }
    public function editEmployee(string $id){
        $session = Session::get('username');
        if(!empty($session)) {
            $data = Employee::find($id);
            return view('admin.edit.employee', ['data' => $data]);
        } else {
            return redirect('/');
        }

    }
    public function updateEmployee(Request $request){
        $session = Session::get('username');
        if(!empty($session)) {
            $employee = Employee::find($request->id);
            $employee->tennv = $request->tennv;
            $employee->diachi = $request->diachi;
            $employee->manv = $request->manv;
            $employee->gioitinh = $request->gioitinh;
            $employee->ngaysinh = $request->ngaysinh;
            $employee->cmnd = $request->cmnd;
            $employee->sdt = $request->sdt;
            $employee->macv = $request->macv;
            $employee->mapb = $request->mapb;
            try {
                $employee->save();
                return redirect('admin/employee')->with('notification', 'Sửa thành công');

            } catch (\Exception $e) {
                return redirect('admin/employee')->with('notification', $e->getMessage());
            }
        } else {
            return redirect('/');
        }
    }
}
