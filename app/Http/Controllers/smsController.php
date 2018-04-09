<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\sms;
use App\number;
use App\user;
use App\schedule;
use Auth;
class smsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       if (!Auth::check()) return Redirect::route('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!Auth::check()) return Redirect::route('home');
        $sms = new sms;
        $sms->campain_id  =$request->id;
        $sms->massage  =$request->massege;
        $sms->smsnumber  =strlen($request->massege)/128 + 1;
        $sms->save();
        $schedule = new schedule;
        $schedule->campain_id =$request->id;
        $schedule->user_id =Auth::id();
        $schedule->sms_id =$sms->id;
        $schedule->save();

        $contacts=user::find( Auth::id())->number;
        return view('campain.selectContactNumber',compact('contacts','sms','schedule'));
        //return view('campain.selectContactNumber');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
}
