<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\number;
use App\user;
use Auth;

class csvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth::check()) return Redirect::route('home');
        return view('campain.csv');
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
        //get
        $upload = $request->file('files');
        $filepath=$upload->getRealPath();
        //open andread
        $file=fopen($filepath,'r');
        $header= fgetcsv($file);
        //dd($header);
        //validate
        $escapedHeader=[];
        foreach ($header as $key => $value) {
            $lheader=strtolower($value);
           $escapedItem=preg_replace('/[^a-z]/','',$lheader);
           array_push($escapedHeader, $escapedItem);
        }
        //dd($escapedHeader);
        //looping through other colom
        while($coloumns=fgetcsv($file)){
            if($coloumns[0]==""){
                continue;
            }
            //trim data
            foreach ($coloumns as $key => &$value) {
               $val=preg_replace('/\D/', '', $value);
            }
            //setting data type
            $data= array_combine($escapedHeader, $coloumns);
            foreach ($data as $key => &$value) {
               $value=($key=="mobile")?(integer)$value:(string)$value;
            }
            //table update
            $name=$data['name'];
            $mobile=$data['mobile'];

            $csv = number::firstOrNew(['mobile'=>$mobile]);
            $csv->user_id = Auth::id();
            $csv->name=$name;
            $csv->mobile=$mobile;
            $csv->save();
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
