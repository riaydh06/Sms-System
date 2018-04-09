@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
	                <div class="panel-heading">Add Contuct Number By CSV File</div>
	                <br>
	                <form action="{{route('csv.store')}}" method="post" enctype="multipart/form-data">
	                {{csrf_field()}}
		                <div class="form-group">
						    <label for="files" class="col-sm-2 col-sm-offset-1 control-label">Add a CSV file</label>
						    <div class="col-sm-9">
							    <input type="file" name="files" id="files">
						    </div>
					    </div>
					    <div class="form-group">
						    <div class="col-sm-offset-3 col-sm-9">
						      <button type="submit" class="btn btn-primary">Add</button>
						    </div>
						</div>
				    </form> 
                </div>
            </div>
        </div>
    </div>
</div>

@endsection