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
					{{ Form::model($tenant,[
					'url' => action('AppartmentManager\Controllers\Tenant\ProfileController@update'),
					'method'=>'PUT']) }}
						<div class="form-group">
							{{ Form::label('Last Name') }}
							{{ Form::text('last_name',null,['class'=>'form-control']) }}
						</div>

						<div class="form-group">
							{{ Form::label('First Name') }}
							{{ Form::text('first_name',null,['class'=>'form-control']) }}
						</div>

						<div class="form-group">
							{{ Form::label('Email') }}
							{{ Form::text('email',null,['class'=>'form-control']) }}
						</div>

						<div class="form-group">
							{{ Form::label('Phone') }}
							{{ Form::text('phone',null,['class'=>'form-control']) }}
						</div>

						<div class="form-group">
							{{ Form::submit('Update',['class'=>'btn btn-appartment']) }}
						</div>
                    {{ Form::close() }}

					<div class="form-group">
						<a href="#">View >></a>
					</div>

				</div>
			</div>
		</div>
	</div>
@stop
