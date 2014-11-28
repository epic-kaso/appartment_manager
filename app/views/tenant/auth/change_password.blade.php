@extends('......Layouts.application')
@section('content')
	<div class="container">
		<div class="row">
			@include('Layouts.Partials.info')
		    <div class="col-sm-4 col-sm-offset-4">
		    	{{ Form::open() }}

					<div class="form-group">
                        {{ Form::label('New Password') }}
                        {{ Form::password('password',['class'=>'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('Confirm Password') }}
                        {{ Form::password('password_confirmation',['class'=>'form-control']) }}
                    </div>

					<div class="form-group">
						{{ Form::submit('Change Password',['class'=>'btn btn-primary']) }}
					</div>
				{{ Form::close() }}
		    </div>
		</div>
	</div>
@stop

