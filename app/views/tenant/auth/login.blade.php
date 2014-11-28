@extends('Layouts.application')
@section('content')
	<div class="container">
		<div class="row">
			@include('Layouts.Partials.info')
		    <div class="col-sm-4 col-sm-offset-4 text-center">
		    <div>
		    	<img src="{{ asset('img/LOGO.gif') }}" class="img-responsive" alt="company logo" />
		    </div>
		    <h1>Tenant Login</h1>
		    	{{ Form::open() }}
					<div class="form-group">
						{{ Form::text('appartment_id',null,['class'=>'form-control','placeholder' => 'APPARTMENT ID']) }}
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

