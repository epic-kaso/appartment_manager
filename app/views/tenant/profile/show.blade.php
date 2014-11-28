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
					<div class="form-group">
						<span>{{ $tenant->last_name  }}</span>, <span>{{ $tenant->first_name  }}</span>
					</div>

					<div class="form-group">
						<span>{{ $tenant->email  }}</span></span>
					</div>

					<div class="form-group">
						<span>{{ $tenant->phone  }}</span>
					</div>

					<div class="form-group">
						<span>Appartment: {{$tenant->appartment_id}}</span>
					</div>

					<div class="form-group">
						<a href="#">Edit >></a>
					</div>

				</div>
			</div>
		</div>
	</div>
@stop
