<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\number;
use App\user;
use App\send;
use Auth;

class selectNumberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth::check()) return Redirect::route('home');
        $contacts=user::find( Auth::id())->number;
        return view('campain.selectContactNumber',compact('contacts'));
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
        $mobiles =$request->number;
        foreach ($mobiles as $value) {
        $send = new send;
        $send->schedule_id = $request->campain;
        $send->user_id = Auth::id();
        $send->mobile = $value;
        $send->save();
        }
        $contact=user::find( Auth::id());
        return view('campain.sendSms',compact('contact'));
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
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
