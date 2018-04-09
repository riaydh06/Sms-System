@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
	                <div class="panel-heading">Add Contuct Number</div>
	                <br>
	                <div class="col-sm-offset-1 col-sm-10">
	                   <a href="manual">Manually Add Conntact Number</a> <br>
                       <a href="csv">Add a CSV File</a> <br>
	                   <a href="handson">Add Handson Table</a>
	                   <br><br>

	                </div>
                    <div class="col-sm-offset-1 col-sm-10">
                        <div class="table-responsive">  
                            <table class="table table-bordered table-striped table-hover">
                            <thead>
                               <tr>
                                   <th>Name</th>
                                   <th>Number</th>
                                   <th>Edit</th>
                                   <th>Delete</th>
                               </tr>
                            </thead>
                            <tbody>  
                               @foreach($contacts as $contact)
                               <tr>
                                   <td>{{$contact->name}}</td>
                                   <td>{{$contact->mobile}}</td>
                                   
                                   <td><a href="{{route('contact.edit',['id'=>$contact->id])}}">Edit</a></td>
                                   <td><form class="form-group" action="{{route('contact.destroy',['id'=>$contact->id])}}" method="POST">
                                     {{csrf_field()}}
                                     {{method_field('DELETE')}}
                                        <button type="submit" style="border: none">Delete</button>
                                    </form></td>
                               </tr>
                            @endforeach
                            </tbody>
                           </table>
                        </div>
                       <br><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection