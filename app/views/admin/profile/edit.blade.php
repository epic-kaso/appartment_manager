@extends('Layouts.application')
@section('content')
    @include('admin.partials.navbar',compact('admin'))

	<div class="container">
		<div class="row">
		    <div class="col-sm-12">
		    </div>
		</div>

		<div class="row">
			@include('Layouts.Partials.info')

			<div class="col-sm-4">
				@include('admin.profile.side_nav')
			</div>
			<div class="col-sm-8">
				<div class="profile">
					{{ Form::model($admin,[
					'url' => action('AppartmentManager\Controllers\Admin\ProfileController@putUpdate'),
					'method'=>'PUT']) }}
						<div class="form-group">
							{{ Form::label('Name') }}
							{{ Form::text('name',null,['class'=>'form-control']) }}
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
