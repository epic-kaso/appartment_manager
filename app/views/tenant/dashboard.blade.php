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
			<span class="text-muted">Complaints</span><hr/>
		    <div>
		    	<a href="{{ route('tenant-dashboard.complaints.create') }}" class="menu-item-link">
		    		<div class="menu-item">
						<span class="glyphicon glyphicon-bell"></span>
						<h4>Make Complaint</h4>
					</div>
		    	</a>

		    	<a href="{{ route('tenant-dashboard.complaints.index') }}" class="menu-item-link">
					<div class="menu-item">
						<span class="glyphicon glyphicon-list"></span>
						<h4>All Complaint</h4>
					</div>
				</a>
		    </div>
		    <span class="text-muted">Payments</span><hr/>
			<div>
				<a href="#" class="menu-item-link">
					<div class="menu-item">
						<span class="fa fa-building"></span>
						<h4>House Rent</h4>
					</div>
				</a>

				<a href="#" class="menu-item-link">
					<div class="menu-item">
						<span class="fa fa-money"></span>
						<h4>Service Charges</h4>
					</div>
				</a>
			</div>
		</div>
	</div>
@stop

