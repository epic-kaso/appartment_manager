@extends('Layouts.application')
@section('content')
    @include('tenant.partials.navbar',compact('tenant'))

	<div class="container" style="padding-top: 70px;">
		<div class="row">
		    <div class="col-sm-12">
		    </div>
		</div>

		<div class="row">
			@include('Layouts.Partials.info')

		</div>
	</div>
@stop

