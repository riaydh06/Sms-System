<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\number;
use App\user;
use Auth;

class contactNumberController extends Controller
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
        return view('campain.addcontactNumber',compact('contacts'));
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
        //
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
        $contacts=number::find($id);
        return view('campain.editnumber',compact('contacts'));
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
        $contacts=number::find($id);
        $contacts->name=$request->name;
        $contacts->mobile=$request->number;
        $contacts->save();
        //return Redirect::to('contact');
        return Redirect::route('contact.index');
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
        $contacts=number::find($id);
        $contacts->delete();
        //return Redirect::to('contact');
        return Redirect::route('contact.index');
    }
}
