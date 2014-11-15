@extends('......Layouts.application')
@section('content')
    @include('tenant.partials.navbar',compact('tenant'))

	<div class="container" style="padding-top: 70px;">
		<div class="row">
		    <div class="col-sm-12">
		    	<h1>Dashboard</h1>
		    </div>
		</div>

		<div class="row">
			@include('Layouts.Partials.info')
		    <div>
		    	<a href="{{ route('complaints.create') }}" class="menu-item-link">
		    		<div class="menu-item">
						<span class="glyphicon glyphicon-bell"></span>
						<h4>Make Complaint</h4>
					</div>
		    	</a>

		    	<a href="{{ route('complaints.create') }}" class="menu-item-link">
					<div class="menu-item">
						<span class="glyphicon glyphicon-bell"></span>
						<h4>Make Complaint</h4>
					</div>
				</a>

				<a href="{{ route('complaints.create') }}" class="menu-item-link">
					<div class="menu-item">
						<span class="glyphicon glyphicon-bell"></span>
						<h4>Make Complaint</h4>
					</div>
				</a>


		    </div>
		</div>
	</div>
@stop

