<?php

namespace App\Http\Controllers;

use App\User;
use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class ControllerStatistics extends Controller
{
    public function AllStatistics() {
        $session = Session::get('username');
        if(!empty($session)) {
            return view('admin.manage.statistics');
        } else {
            return redirect('/');
        }

    }
}
