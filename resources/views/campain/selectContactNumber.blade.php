@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
	                <div class="panel-heading">Select Contuct Number</div>
	                <br>
	                <div class="col-sm-offset-1 col-sm-10">
                    <form action="{{route('select.store')}}" method="POST">
	                    <div class="table-responsive">  
                            <table class="table table-bordered table-striped table-hover">
                            <thead>
                               <tr>
                                   <th>Name</th>
                                   <th>Number</th>
                                   <th>Select Number</th>
                               </tr>
                            </thead>
                            <tbody>  
                               @foreach($contacts as $contact)
                               <tr>
                                   <td>{{$contact->name}}</td>
                                   <td>{{$contact->mobile}}</td>
                                   <td>
                                    <input type="checkbox" value="{{$contact->mobile}}" name="number[]"></td>
                               </tr>
                            @endforeach
                            </tbody>
                           </table>
                        </div>
                        {{csrf_field()}}
                        <input type="hidden" value="{{$sms->massage}}" name="massage">
                        <input type="hidden" value="{{$schedule->id}}" name="campain">
                        <div class="form-group">
                            <div class="col-sm-offset-9 col-sm-2 ">
                              <button type="submit" class="btn btn-primary">Select Number</button>
                            </div>
                         </div>
                       </form>
	                   <br><br>
	                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection