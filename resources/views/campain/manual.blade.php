@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
	                <div class="panel-heading">Add Contuct Number Manually </div>
	                <br>
	                <div class="col-sm-offset-1 col-sm-10">
                    <form class="form-horizontal" action="{{route('manual.store')}}" method="POST">
                    {{csrf_field()}}
	                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Name:</label>
                        <div class="col-sm-9">
                           <input id="name" type="text" class="form-control" placeholder="Name"  name="name">
                         </div>
                      </div>
                      <div class="form-group">
                        <label for="number" class="col-sm-2 control-label">Number:</label>
                        <div class="col-sm-9">
                           <input id="number" type="text" class="form-control" placeholder="Number"   name="number" >
                         </div>
                      </div>
                      <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-9 ">
                              <button type="submit" class="btn btn-primary">Add</button>
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