<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\campain;
use App\user;
use Auth;
use Illuminate\Support\Facades\Redirect;

class campainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth::check()) return Redirect::route('home');
        $campains = user::find( Auth::id())->campain;
        return view('home',compact('campains'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::check()) return Redirect::route('home');
        return view('campain.createCampain');
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
        $campain = new campain;
        $campain->user_id = Auth::id();
        $campain->campainName=$request->name;
        $campain->startdate=$request->startdate;
        $campain->endingdate=$request->endingdate;
        $campain->sendingoption=$request->sendingoption;
        $campain->continue=$request->continue;
        $campain->save();
        //return $request->all();
        return view('campain.massage',compact('campain'));
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
        if (!Auth::check()) return Redirect::route('home');
         $campain =campain::find($id);
         return view('campain.editCampain',compact('campain'));
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
        if (!Auth::check()) return Redirect::route('home');
        $campain =campain::find($id);
        $campain->campainName=$request->name;
        $campain->startdate=$request->startdate;
        $campain->endingdate=$request->endingdate;
        $campain->sendingoption=$request->sendingoption;
        $campain->continue=$request->continue;
        $campain->save();
        //return Redirect::to('home');
        return Redirect::route('home');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Auth::check()) return Redirect::route('home');
        $campain=campain::find($id);
        $campain->delete();
        //return Redirect::to('campain');
        return Redirect::route('campain.index');
    }
}
