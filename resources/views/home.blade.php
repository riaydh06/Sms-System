@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel panel-body">
                     <div class="panel-heading">Campain</div>

                    <!--<div class="panel-body">
                     create a new campain <button onclick="window.location=''" class="btn btn-primary">campain</button>
                    </div>
                    -->
                     
                    <div class="col-sm-offset-1 col-sm-10">
                    Create a new <a href="campain/create" class="">campain</a> ( Add or Update  <a href="contactNumber">  Contact Number</a> First)
                    <br><br>
                        <div class="table-responsive">  
                            <table class="table table-bordered table-striped table-hover">
                            <thead>
                               <tr>
                                   <th>Campain Name</th>
                                   <th>Start Date </th>
                                   <th>Ending Date </th>
                                   <th>Sending Option </th>
                                   <th>Continue Option </th>
                                   <th>Edit</th>
                                   <th>Delete</th>
                               </tr>
                            </thead>
                            <tbody>  
                               @foreach($campains as $campain)
                               <tr>
                                   <td>{{$campain->campainName}}</td>
                                   <td>{{$campain->Startdate}}</td>
                                   <td>{{$campain->endingdate}}</td>
                                   <td>{{$campain->sendingoption}}</td>
                                   <td>{{$campain->continue}}</td>
                                   
                                   <td><a href="{{route('campain.edit',['id'=>$campain->id])}}">Edit</a></td>
                                   <td><form class="form-group" action="{{route('campain.destroy',['id'=>$campain->id])}}" method="POST">
                                     {{csrf_field()}}
                                     {{method_field('DELETE')}}
                                        <button type="submit" style="border: none">Delete</button>
                                    </form></td>
                               </tr>
                               @endforeach
                            </tbody>
                           </table>
                       <br><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
