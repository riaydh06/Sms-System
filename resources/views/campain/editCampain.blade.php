@extends('layouts.app')

@section('content')
 <div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                <div class="panel-heading">Campain</div>
                
                <br>
                	 
                <form class="form-horizontal" action="{{route('campain.update',['id'=>$campain->id])}}" method="POST" >
                {{csrf_field()}}
                {{method_field('PUT')}}
                <fieldset>
				  <div class="form-group">
				    <label for="inputEmail3" class="col-sm-3 control-label">Campain Name:</label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" name="name" id="inputEmail3" value="{{$campain->campainName}}">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="inputEmail4" class="col-sm-3 control-label">Start Date:</label>
				    <div class="col-sm-8">
				      <input type="date" class="form-control" name="startdate" id="inputEmail4" value="{{$campain->Startdate}}">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="inputPassword3" class="col-sm-3 control-label" >Ending Date:</label>
				    <div class="col-sm-8">
				      <input type="date" class="form-control" name="endingdate" id="inputPassword3" value="{{$campain->endingdate}}" >
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="inputPassword4" class="col-sm-3 control-label">Sending Option:</label>
				    <div class="col-sm-8">
				        <select name="sendingoption" value="{{$campain->sendingoption}}" id="inputPassword4"  class="form-control" >
                		    <option <?php if($campain->sendingoption=='once'){echo 'selected';}?> value="once">Once</option>
                		    <option <?php if($campain->sendingoption=='continue'){echo 'selected';}?> value="continue">Continue</option>
                	    </select>
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="inputPassword5" class="col-sm-3 control-label">If Continuous:</label>
				    <div class="col-sm-8">
				        <select name="continue"  id="inputPassword5" name="continue" class="form-control">
                		    <option value=""></option>
                		    <option <?php if($campain->continue=='Every_day'){echo 'selected';}?> value="Every_day">Every day</option>
                		    <option <?php if($campain->continue=='Every_month'){echo 'selected';}?>value="Every_week">Every week</option>
                		    <option <?php if($campain->continue=='Every_month'){echo 'selected';}?>value="Every_month">Every month</option>
                	    </select>
				    </div>
				  </div>
				  
				  <div class="form-group">
				    <div class="col-sm-offset-3 col-sm-10">
				      <button type="submit" class="btn btn-primary">Update</button>
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