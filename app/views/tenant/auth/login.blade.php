@extends('Layouts.application')
@section('content')
	<div class="container">
		<div class="row">
			@include('Layouts.Partials.info')
			<div class="col-md-4 col-md-offset-4 col-xs-8 col-xs-offset-2 text-center">
		    <div>
		    	<img src="{{ asset('img/LOGO.gif') }}" class="img-responsive" alt="company logo" />
		    </div>
				<h1>Resident Login</h1>
		    	{{ Form::open() }}
					<div class="form-group">
						{{ Form::text('email',null,['class'=>'form-control','placeholder' => 'EMAIL ADDRESS']) }}
					</div>

					<div class="form-group">
                        {{ Form::password('password',['class'=>'form-control','placeholder' => 'PASSWORD']) }}
                    </div>

					<div class="form-group">
						{{ Form::submit('Login',['class'=>'btn btn-appartment btn-block']) }}
					</div>
				{{ Form::close() }}
		    </div>
		</div>
	</div>
@stop

