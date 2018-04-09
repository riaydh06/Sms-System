<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\campain;
use App\user;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
        // public function make_recipients($recipients){
        //     $r = [];
        //     foreach ($recipients as $recipient){
        //         $r[]['gsm'] = $recipient;
        //     }
        //     return $r;
        // }

        // public function send_sms($sender,$text,$recipients){
        //     $data['authentication']['username'] = 'hostomega-parvin';
        //     $data['authentication']['password'] = '7AxLu4xm';

        //     $message['sender'] = $sender;
        //     $message['text'] = $text;
        //     $message['recipients'] = $this->make_recipients($recipients);

        //     $data['messages'][] = $message;
        //     $data_string = json_encode($data);
        //     // echo ($data_string);
        //     $ch = curl_init('http://107.20.199.106/api/v3/sendsms/json');
        //     curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        //     curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //     curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        //             'Content-Type: application/json',
        //             '   Content-Length: ' . strlen($data_string))
        //     );

        //     $result = curl_exec($ch);
        // }

    public function index()
    {
        // $date= Carbon::now();
        // //take data from campain table
        // $data = DB::table('campains')->select('id','Startdate','continue')->where('sendingoption','continue')->where('Startdate','<=',$date)->where('endingdate','>=',$date)->get();
        // foreach ($data as $key => $campain) {
        //     $campain_id= $campain->id;
        //     $Startdate= $campain->Startdate;
        //     $continue= $campain->continue;

        //     //take data from schedule table
        //     $schedules=DB::table('schedules')->select('id','sms_id')->where('campain_id',$campain_id)->get();
        //     foreach ($schedules as $key => $schedule) {
        //        $schedule_id = $schedule->id;
        //        $sms_id = $schedule->sms_id;

        //        //take data fron sends table
        //        $send_numbers=DB::table('sends')->select('mobile')->where('schedule_id',$schedule_id)->get();
        //        foreach ($send_numbers as $key => $send_number) {
        //              $send_number = '880'.$send_number->mobile;

        //              //take data from sms table
        //              $massages=DB::table('sms')->select('massage')->where('id',$sms_id)->get();
        //                   $massage = $massages[0]->massage;
        //                   //echo $massage;
        //                   //echo $send_number;
        //                   //$this->send_sms('ITSD',$massage,[$send_number]);
        //                   $days = Carbon::parse($Startdate);
        //                   $now = Carbon::now();
        //                   $day = $days->diffInDays($now);
        //                   if($continue == 'Every_day'){
        //                     if(($day%1)==0){
        //                        $this->send_sms('ITSD',$massage,[$send_number]); 
        //                        //echo 'hello';
        //                     }
        //                   }
        //                   elseif($continue == 'Every_week'){
        //                     if(($day%7)==0){
        //                        $this->send_sms('ITSD',$massage,[$send_number]); 
        //                     }
        //                   }
        //                   elseif($continue == 'Every_month'){
        //                     if(($day%30)==0){
        //                        $this->send_sms('ITSD',$massage,[$send_number]); 
        //                     }
        //                   }

        //         }    
              
        //        //echo  $schedule_id.$sms_id.'<br>';
        //     }
        // }

        //print $now->diffInDays($end);
      
        //var_dump($data[0]->id);
        $campains = user::find( Auth::id())->campain;
        return view('home',compact('campains'));
        //return view('home',compact('campains','data'));
    }
}
