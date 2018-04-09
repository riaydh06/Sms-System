<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\number;
use App\user;
use Auth;

class handsonTableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth::check()) return Redirect::route('home');
        return view('campain.handsonTable');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $data = json_decode($request->data, true);
       // print_r($data['data']);
        // die();
        
        foreach ($data['data'] as $value) {
            if ($value[0] != '' && $value[1] !=''){
                $contacts= new  number;
                $contacts->user_id = Auth::id();
                $contacts->name = $value[0];
                $contacts->mobile = $value[1];
                $contacts->save();
            }
             
        }
        $contacts=user::find( Auth::id())->number;
        return view('campain.addcontactNumber',compact('contacts'));

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
