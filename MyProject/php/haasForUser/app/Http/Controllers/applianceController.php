<?php

namespace App\Http\Controllers;

use App\Models\schedule;
use App\Models\appliance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class applianceController extends Controller
{
    public function index($view) {
        $appliances = appliance::join('user as u', ['u.id' => 'appliance.user_id'])
                            // ->select('appliance.name as app_name', 'u.name', 'switch_no', 'state', 'access', 'sync')
                            ->where('user_id', 1)
                            ->get();
        return view('customer/' . $view , [
            'appliances' => $appliances,
            'i' => 1
        ]);
    }



    public function applianceTableJSON() {
        $appliances = appliance::join('user as u', ['u.id' => 'appliance.user_id'])
                            // ->select('appliance.name as app_name', 'u.name', 'switch_no', 'state', 'access', 'sync')
                            ->where('user_id', 1)
                            ->get();
        return json_encode($appliances);
    }
    public function addAppliance(Request $req) {
        $data = $req->input();
        $appliance_name = $data['app-name'];
        $switch_number = $data['swn'];
        $state = 0;
        $access = 1;
        $user_id = 1;

        
        $lastID = $this->schedule()->id;
        $insert = appliance::create([
            'app_name' => $appliance_name,
            'switch_no' => $switch_number,
            'pin' => 15,
            'state' => $state,
            'access' => $access,
            'user_id' => $user_id,
            'schedule_id' => $lastID
        ]);
        
        if($insert) {
            
            return 'Appliance (' . $appliance_name . ') added successfull';
        } else {
            return 'Process failed';
        }
    }

    function schedule() {
        $starting = "00:00";
        $ending = "23:59";
        $insertTime = schedule::create([
            'starting' => $starting,
            'end' => $ending,
            'period' => 'All days',
            'sync' => 0
        ]);
        return $insertTime;
    }

    public function getSchedule(Request $req) {
        $schedule_id = $req->input('schedule_id');
        $schedule = schedule::where('id', $schedule_id)->get();
        return json_encode($schedule); 
    }

    public function insertSchedule(Request $req) {
        $from = $req->input('from');
        $stime = explode(':', $from);
        $shr = $stime[0];
        $smin = $stime[1];

        $to = $req->input('to');
        $etime = explode(':', $to);
        $ehr = $etime[0];
        $emin = $etime[1];

        $period = $req->input('period');
        $schedule_id = $req->input('schedule-id');

        $update = schedule::where('id', $schedule_id) -> update([
            'shr' => $shr,
            'smin' => $smin,
            'ehr' => $ehr,
            'emin' => $emin,
            'period' => $period,
            'sync' => 1
        ]);

        if(!$update){
            return "Process failed - " . $schedule_id;
        }
    }

    public function fromDB() {
        $data = DB::table('wifi')->get();
        $str = array();
        foreach($data as $wifi) {
            $str[] = $wifi->id;
            $str[] = $wifi->ssid;
            $str[] = $wifi->password;
        }
        echo "hello";
    }

    public function turn_appliance_off_on(Request $req) {
        $data = $req->input();
        $swn = $data['switch_number'];
        $state = $data['state'];
        $app_name = $data['app_name'];

        $app_detail = ['state' => $state];
        $update = appliance::where('switch_no', $swn)->update($app_detail);
        if ($state == 1) 
            $state = "ON";
        else
            $state = "OFF";

        if ($update)
            $info = "&nbsp;<b>" . $app_name . "</b>&nbsp; behave &nbsp;<b>". $state ."</b>&nbsp; state";
        else
            $info = "Fail to reach the appliance, try again";  
            
        return $info;
    }

    public function getApplianceState() {
    $select = appliance::join('schedule as s', ['appliance.schedule_id' => 's.id'])->get();
    $arr = array();
    $row = 0;
    $number_of_rows = count($select);
    foreach($select as $app) {
        $arr[$row][] = $app['pin'];
        $arr[$row][] = $app['state'];
        $arr[$row][] = $number_of_rows;
        $arr[$row][] = $app['shr'];
        $arr[$row][] = $app['smin'];
        $arr[$row][] = $app['ehr'];
        $arr[$row][] = $app['emin'];
        $arr[$row][] = $app['sync'];
        $arr[$row][] = $app['period'];
        $row++;
    }
    echo json_encode($arr); 
    }


    function currentTime() {
        $arr = array();
        $arr[] = $this->now('H');
        $arr[] = $this->now('i');

        echo json_encode($arr);
    }
}
