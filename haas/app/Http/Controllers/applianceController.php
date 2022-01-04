<?php

namespace App\Http\Controllers;

use App\Models\schedule;
use App\Models\switches;
use App\Models\appliance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class applianceController extends Controller
{
    public function index($view) {
        $appliances = appliance::join('user as u', ['u.id' => 'appliance.user_id'])
                            ->join('schedule as s', ['s.app_id' => 'appliance.id'])
                            ->select('appliance.id as app_id', 'app_name', 'u.name', 'switch_no', 'state', 'access','ehr','shr','emin','smin')
                            ->where('user_id', $this->user_id())
                            ->get();
        
        $busy_switches = appliance::join('switches as sw', ['sw.id' => 'appliance.switch_no'])
                                    ->join('user as u', ['u.id' => 'appliance.user_id'])
                                    ->select('sw.sw as swn')
                                    ->where('user_id', $this->user_id())
                                    ->get();

        $bsw = array();
        foreach ($busy_switches as $busy_sw){
                $bsw[] = $busy_sw->swn;
        }
        
        $free_switches = switches::whereNotIn('switches.sw', $bsw)
                                    ->get();
            
        
        return view('pages/' . $view , [
            'appliances' => $appliances,
            'switches' => $free_switches,
            'i' => 1
        ]);
    }


    public function applianceTableJSON() {
        $appliances = appliance::join('user as u', ['u.id' => 'appliance.user_id'])
                            // ->select('appliance.name as app_name', 'u.name', 'switch_no', 'state', 'access', 'sync')
                            ->where('user_id', $this->user_id())
                            ->get();
        return json_encode($appliances);
    }


    public function addAppliance(Request $req) {
        $data = $req->input();
        $appliance_name = $data['app-name'];
        $switch_number = explode('>!<', $data['swn']);
        $pin = $switch_number[1];
        $switch_number = $switch_number[0];
        $state = 0;
        $access = 1;
        $user_id = $this->user_id();

        
        
        $insert = appliance::create([
            'app_name' => $appliance_name,
            'switch_no' => $switch_number,
            'pin' => $pin,
            'state' => $state,
            'access' => $access,
            'user_id' => $user_id
        ]);

        $app_id = $insert->id;
        $this->schedule($app_id);
        
        if($insert) {
            return 'Appliance (' . $appliance_name . ') added successfull';
        } else {
            return 'Process failed';
        }
    }


    function schedule($app_id) {
        $insertTime = schedule::create([
            'shr' => 0,
            'smin' => 0,
            'ehr' => 0,
            'emin' => 0,
            'period' => 'All days',
            'sync' => 0, 
            'app_id' => $app_id
        ]);
        return $insertTime;
    }


    public function getSchedule(Request $req) {
        $schedule_id = $req->input('schedule_id');
        $schedule = schedule::where('id', $schedule_id)->get();
        return json_encode($schedule); 
    }


    public function insertSchedule(Request $req) {
        $data = $req->input();
        
        $app_id = $data['app_id'];

        if ($data['period'] == 'start') {
            $shr = $data['hours'];
            $smin =  $data['minutes'];

            $update = schedule::where('app_id', $app_id) -> update([
                'shr' => $shr,
                'smin' => $smin
            ]);
        }

        if ($data['period'] == 'end') {
            $ehr = $data['ehr'];
            $emin =  $data['emin'];

            $update = schedule::where('app_id', $app_id) -> update([
                'ehr' => $ehr,
                'emin' => $emin
            ]);
        }

        
        if(!$update){
            return "Process failed - " . 45;
        } else {
            return 'saved';
        }
    }

    function validateSchedule(Request $req) {
        $state = $req->input('state');
        $app_id = $req->input('app_id');

        $update = schedule::where('app_id', $app_id) -> update([
            'sync' => $state
        ]);

        if($update) {return 'ok';}
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


    public function currentTime() {
        $arr = array();
        $arr[] = $this->now('H');
        $arr[] = $this->now('i');

        echo json_encode($arr);
    }


    public function deleteAppliance(Request $req) {
        $app_id = $req->input('app_id');
        $delete = appliance::where('id', $app_id)->delete();
        if ($delete) {
            return "deleted successfull";
        }
    }

    public function json(Request $req) {
        $myfile = "js/data.json";
        $jsonArray = array();
        $data_exist = false;

        $data =  $req->input('data');
        $data = json_decode($data, true);
        // $this->dd($data);

        if (file_get_contents($myfile) != false) {
            $inp = file_get_contents($myfile);
            $jsonArray = json_decode($inp, true);
            // $this->dd($jsonArray);
            $records = count($jsonArray); 
            
            for($i = 0; $i < $records; $i++) {
                if ($jsonArray[$i]['id'] == $data['id'] && $jsonArray[$i]['date'] == $data['date']){
                    $jsonArray[$i]['time'] += 1;
                    $data_exist = true;
                }
            }
        }
        
        
        if(!$data_exist) {
            array_push($jsonArray, $data);
        }

        $jsonData = json_encode($jsonArray);
        file_put_contents($myfile, $jsonData);
        
    }

    public function setAppID(Request $req) {
        $app_id = $req->input('app_id');
        $this->setCookie([
            'app_id' => $app_id
        ], 60 * 24 * 365);
    }

    public function getJSON(Request $req) {
        
        header('Content-Type: application/json');
        $jsonArray = array();
        $myfile = "js/data.json";
        $jsonData = file_get_contents($myfile);
        $jsonArray = json_decode($jsonData, true);
        $rows = count($jsonArray);
        // $this->dd($jsonArray);
        $newArray = array();

        for ($i = 0; $i < $rows; $i++) {
            if($jsonArray[$i]['id'] == $_COOKIE['app_id']){
                $newArray [$i]['x'] = $this->dateFormat($jsonArray[$i]['date'], 'd M Y');
                $newArray [$i]['y'] = $jsonArray[$i]['time'];
                $newArray [$i]['appname'] = $jsonArray[$i]['appname'];
            }
        }
        echo $newJson = json_encode($newArray);
        // $this->dd($newJson);

    }
}
