@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
	                <div class="panel-heading">Add Contuct Number Manually by Handson Table</div>
	                <br>
	                <div class="col-sm-offset-1 col-sm-10">
	                    <form id='data_form' action="{{route('handson.store')}}" method="POST">
		                    <div id="example1" class="hot handsontable htColumnHeaders"></div>
		                    <br>
							<button id='save'>Save</button>
							<div id='show'></div>
							  {{csrf_field()}}
						     <input type="hidden" name="data" id='value'>
	                    </form>	 
	                </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection