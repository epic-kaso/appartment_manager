@extends('Layouts.application')
@section('content')
    @include('tenant.partials.navbar',compact('tenant'))

	<div class="container">
		<div class="row">
		    <div class="col-sm-12">
		    </div>
		</div>

		<div class="row">
			@include('Layouts.Partials.info')

			<div class="col-sm-4">
				@include('tenant.profile.side_nav')
			</div>
			<div class="col-sm-8">
				<div class="profile">
		    	{{ Form::open(['url' => action('AppartmentManager\Controllers\Tenant\Auth\AuthController@postChangePassword')]) }}

					<div class="form-group">
                        {{ Form::password('new_password',['class'=>'form-control','placeholder'=>'NEW PASSWORD']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::password('new_password_confirmation',['class'=>'form-control','placeholder'=>'CONFIRM NEW PASSWORD']) }}
                    </div>

					<div class="form-group">
						{{ Form::submit('Change Password',['class'=>'btn btn-appartment']) }}
					</div>
				{{ Form::close() }}
		    </div>
		</div>
	</div>
</div>
@stop

