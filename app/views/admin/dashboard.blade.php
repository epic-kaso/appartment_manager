@extends('......Layouts.application')
@section('content')
    @include('admin.partials.navbar',compact('admin'))

	<div class="container" style="padding-top: 70px;">
		<div class="row">
		    <div class="col-sm-12">
		    	<h1>Admin Dashboard</h1>
		    </div>
		</div>

		<div class="row">
			@include('Layouts.Partials.info')
		    <div>
		    	<a href="{{ route('complaints.create') }}" class="menu-item-link">
		    		<div class="menu-item">
						<span class="glyphicon glyphicon-bell"></span>
						<h4>View Complaints</h4>
					</div>
		    	</a>

		    	<a href="{{ route('complaints.index') }}" class="menu-item-link">
					<div class="menu-item">
						<span class="glyphicon glyphicon-list"></span>
						<h4>View Appartments</h4>
					</div>
				</a>
		    </div>
		</div>
	</div>
@stop

