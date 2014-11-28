@extends('......Layouts.application')
@section('content')
	<div class="container">
		<div class="row">
			@include('Layouts.Partials.info')
		    <div class="col-sm-4 col-sm-offset-4">
		    	{{ Form::open() }}
					<div class="form-group">
						{{ Form::label('Appartment ID') }}
						{{ Form::text('appartment_id',null,['class'=>'form-control']) }}
					</div>
					<div class="form-group">
						{{ Form::submit('Reset Password',['class'=>'btn btn-primary']) }}
					</div>
				{{ Form::close() }}
		    </div>
		</div>
	</div>
@stop

