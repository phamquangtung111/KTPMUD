<?php

namespace App\Http\Controllers;

use App\Checkin;
use App\CheckinData;
use App\User;
use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class ControllerSalary extends Controller
{
    public function AllSalary() {
        $session = Session::get('username');
        if(!empty($session)) {
            $employees = Employee::all();
            $checkin = Checkin::all();
            $checkinData = CheckinData::all();
            $tmp = $checkinData->groupBy('macheckin');
            $result = [];

            if ($tmp) {
                foreach($tmp as $val) {
                    $result[$val->toArray()[0]["macheckin"]] = count($val->toArray());
                }
            }

            return view('admin.manage.salary', ['employees' => $employees, 'checkin' => $checkin,'result' => $result]);
        } else {
            return redirect('/');
        }

    }
}
