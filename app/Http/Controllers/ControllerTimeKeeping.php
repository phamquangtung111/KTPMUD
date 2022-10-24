<?php

namespace App\Http\Controllers;

use App\Checkin;
use App\CheckinData;
use App\User;
use App\Employee;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class ControllerTimeKeeping extends Controller
{
    public function AllTimeKeeping() {
        $session = Session::get('username');
        if(!empty($session)) {
            $data = DB::table('checkin')
                ->select('*')
                ->join('employees','employees.id','=','checkin.userId')
                ->get();
            $checkin = CheckinData::all();

            return view('admin.manage.timekeeping', ['data' => $data,'checkin'=>$checkin]);
        } else {
            return redirect('/');
        }
    }

    public function checkin(Request $request) {
        $userId = $request->id;
        $tz = 'Asia/Ho_Chi_Minh';
        $timestamp = time();
        $date = new DateTime("now", new DateTimeZone($tz));
        $date->setTimestamp($timestamp);
        $dateCheckin = $date->format('d/m/Y');
        $timeCheckin = $date->format('H:i:s');
        $message = [
            'message' => [
                'Customer ID' => $userId,
                'Date Checkin' => $dateCheckin,
                'Time Checkin' => $timeCheckin
            ]
        ];
        $checkin = Checkin::where('userId', $userId)->first();
        if($checkin != null) {
            $array = $checkin->get()->toArray();
            $data = reset($array);
            if (!$data) {
                $checkin = new Checkin();
                $checkin->userId = $userId;
                try {
                    $checkin->save();
                    $macheckin = $checkin->userId;
                    $checkinData = new CheckinData();
                    $checkinData->macheckin = $macheckin;
                    $checkinData->date = $dateCheckin;
                    $checkinData->checkin_time = $timeCheckin;
                    $checkinData->save();
                    return view('api', $message, ['Content-Type' => 'application/json']);
                } catch (\Exception $e) {
                    return view('api', ['message' => $e], ['Content-Type' => 'application/json']);
                }
            } else {
                $checkinData = CheckinData::where('macheckin', $checkin->userId)->where('date', $dateCheckin)->first();
                if($checkinData != null) {
                    $checkinData->checkout_time= $timeCheckin;
                    $message = [
                        'message' => [
                            'Customer ID' => $userId,
                            'Date Checkin' => $dateCheckin,
                            'Time Checkout' => $timeCheckin
                        ]
                    ];
                } else {
                    $macheckin = $checkin->userId;
                    $checkinData = new CheckinData();
                    $checkinData->macheckin = $macheckin;
                    $checkinData->date = $dateCheckin;
                    $checkinData->checkin_time = $timeCheckin;
                }
                try {
                    $checkinData->save();
                    return view('api', $message, ['Content-Type' => 'application/json']);
                } catch (\Exception $e) {
                    return view('api', ['message' => $e], ['Content-Type' => 'application/json']);
                }
            }
        } else {
            $checkin = new Checkin();
            $checkin->userId = $userId;
            try {
                $checkin->save();
                $macheckin = $checkin->userId;
                $checkinData = new CheckinData();
                $checkinData->macheckin = $macheckin;
                $checkinData->date = $dateCheckin;
                $checkinData->checkin_time = $timeCheckin;
                $checkinData->save();
                return view('api', $message, ['Content-Type' => 'application/json']);
            } catch (\Exception $e) {
                return view('api', ['message' => $e], ['Content-Type' => 'application/json']);
            }
        }
    }
}
