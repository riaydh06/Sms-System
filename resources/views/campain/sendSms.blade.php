@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
	                <div class="panel-heading">Send SMS</div>
	                <br>
	                <div class="col-sm-offset-1 col-sm-10">
                        <form action="{{route('sendSms')}}" class="form-horizontal"  method="POST">
                        {{csrf_field()}}
                        <input type="hidden" name='from' value='880{{$contact->mobile}}'>
                        <input type="hidden" class="form-control" name="massage" id="massage" value="{{$_POST['massage']}}">
                        Massage : {{$_POST['massage']}}
                        
                          <div class="form-group">
                            
                            <div class="col-sm-8">
                            Send To : 
                            @foreach($_POST['number'] as $mob)
                              <input style='display:none' checked type="checkbox" class="form-control" name="to[]" id="to" value="880{{$mob}}">880{{$mob}},
                            @endforeach
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <div class="col-sm-offset-10 col-sm-2 ">
                              <button type="submit" class="btn btn-primary">Send</button>
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