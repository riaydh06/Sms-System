<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\number;
use App\user;
use Auth;

class addcontactNumberController extends Controller
{
    public function index(){
        if (!Auth::check()) return Redirect::route('home');
    	$contacts=user::find( Auth::id())->number;
        return view('campain.addcontactNumber',compact('contacts'));
    	//return view('campain.addcontactNumber');
    }
    public function sendSms(Request $request){
        if (!Auth::check()) return Redirect::route('home');
        function make_recipients($recipients){
            $r = [];
            foreach ($recipients as $recipient){
                $r[]['gsm'] = $recipient;
            }
            return $r;
        }

        function send_sms($sender,$text,$recipients){
            $data['authentication']['username'] = 'hostomega-parvin';
            $data['authentication']['password'] = '7AxLu4xm';

            $message['sender'] = $sender;
            $message['text'] = $text;
            $message['recipients'] = make_recipients($recipients);

            $data['messages'][] = $message;
            $data_string = json_encode($data);
            // echo ($data_string);
            $ch = curl_init('http://107.20.199.106/api/v3/sendsms/json');
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    'Content-Type: application/json',
                    '   Content-Length: ' . strlen($data_string))
            );

            $result = curl_exec($ch);
            //print_r($result);
        }
        //send_sms($sender,$text,$recipients)
         $to = $request->to;
         $massage = $request->massage;
         //print_r($to);

        send_sms('ITSD',$massage,$to);

     	// $to = $request->to;
     	// foreach ($to as $key => $value) {
     	// 	$nexmo = app('Nexmo\Client');
	     //    $nexmo->message()->send([
	     //    'to' => $value,
	     //    'from' => $request->from,
	     //    'text' => $request->massage
	     //    ]);
     	// }
     	return view('campain.confirm');
    }
}
