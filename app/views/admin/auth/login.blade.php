@extends('......Layouts.application')
@section('content')
	<div class="container" style="padding-top: 70px;">
		<div class="row">
			@include('Layouts.Partials.info')
		    <div class="col-sm-4 col-sm-offset-4">
		    	<h1>Admin Login</h1>
		    	{{ Form::open() }}
					<div class="form-group">
						{{ Form::label('Email') }}
						{{ Form::email('email',null,['class'=>'form-control']) }}
					</div>

					<div class="form-group">
                        {{ Form::label('Your Password') }}
                        {{ Form::password('password',['class'=>'form-control']) }}
                    </div>

					<div class="form-group">
						{{ Form::submit('Login',['class'=>'btn btn-primary']) }}
					</div>
				{{ Form::close() }}
		    </div>
		</div>
	</div>
@stop

