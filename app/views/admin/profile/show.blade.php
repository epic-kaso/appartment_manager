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
					<div class="form-group">
						<span>{{ $admin->name  }}</span>
					</div>

					<div class="form-group">
						<span>{{ $admin->email  }}</span></span>
					</div>

					<div class="form-group">
						<span>{{ $admin->phone  }}</span>
					</div>

					<div class="form-group">
						<a href="#">Edit >></a>
					</div>

				</div>
			</div>
		</div>
	</div>
@stop
