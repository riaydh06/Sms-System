@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
            <div class="panel-body">
                <div class="panel-heading">Massage</div>

                <br>
                	 
                <form class="form-horizontal" action="{{route('sms.store')}}" method="POST" >
                <input type="hidden" name="id" value="{{$campain->id}}">
                {{csrf_field()}}
                <fieldset>
				  <div class="form-group">
				    <label for="inputCharacterMultiple" class="col-sm-2 control-label">Massage:</label>
				    <div class="col-sm-9">
				     <textarea required onkeyup="calculateCountMultiple()" name="massege" id="inputCharacterMultiple" cols="30" rows="10" class="form-control"></textarea>
				     
				    </div>
				  </div>
				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-9">
				      <button type="submit" class="btn btn-primary">Ceate</button>
				      <div class="pull-right" id="remainCharacterMultiple"></div>
				    </div>
				  </div>
				  </fieldset>
				</form>
            </div>
            </div>
        </div>
    </div>
</div>

@endsection