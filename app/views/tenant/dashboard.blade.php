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
			<h3>Complaints</h3><hr/>
		    <div>
		    	<a href="{{ route('complaints.create') }}" class="menu-item-link">
		    		<div class="menu-item">
						<span class="glyphicon glyphicon-bell"></span>
						<h4>Make Complaint</h4>
					</div>
		    	</a>

		    	<a href="{{ route('complaints.index') }}" class="menu-item-link">
					<div class="menu-item">
						<span class="glyphicon glyphicon-list"></span>
						<h4>All Complaint</h4>
					</div>
				</a>
		    </div>
		    <h3>Payments</h3><hr/>
			<div>
				<a href="{{ route('complaints.create') }}" class="menu-item-link">
					<div class="menu-item">
						<span class="glyphicon glyphicon-bell"></span>
						<h4>House Rent</h4>
					</div>
				</a>

				<a href="{{ route('complaints.index') }}" class="menu-item-link">
					<div class="menu-item">
						<span class="glyphicon glyphicon-list"></span>
						<h4>Service Charges</h4>
					</div>
				</a>
			</div>
		</div>
	</div>
@stop

