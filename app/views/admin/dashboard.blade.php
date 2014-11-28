@extends('......Layouts.application')
@section('content')
    @include('admin.partials.navbar',compact('admin'))

	<div class="container" >
		<div class="row">
			@include('Layouts.Partials.info')
		    <div>
		    	<a href="{{ route('admin-complaints.index') }}" class="menu-item-link">
		    		<div class="menu-item">
						<span class="glyphicon glyphicon-bell"></span>
						<h4>View Complaints</h4>
					</div>
		    	</a>

		    	<a href="{{ route('appartment.index') }}" class="menu-item-link">
					<div class="menu-item">
						<span class="glyphicon glyphicon-list"></span>
						<h4>View Appartments</h4>
					</div>
				</a>
				<a href="{{ route('appartment.create') }}" class="menu-item-link">
					<div class="menu-item">
						<span class="glyphicon glyphicon-list"></span>
						<h4>Add New Appartment</h4>
					</div>
				</a>
				<a href="{{ route('tenant.index') }}" class="menu-item-link">
					<div class="menu-item">
						<span class="glyphicon glyphicon-bell"></span>
						<h4>View Tenants</h4>
					</div>
				</a>

				<a href="{{ route('tenant.create') }}" class="menu-item-link">
					<div class="menu-item">
						<span class="glyphicon glyphicon-list"></span>
						<h4>Add New Tenant</h4>
					</div>
				</a>
				<a href="{{ route('admin.index') }}" class="menu-item-link">
					<div class="menu-item">
						<span class="glyphicon glyphicon-list"></span>
						<h4>View Admins</h4>
					</div>
				</a>
				<a href="{{ route('admin.create') }}" class="menu-item-link">
					<div class="menu-item">
						<span class="glyphicon glyphicon-list"></span>
						<h4>Add New Admin</h4>
					</div>
				</a>
				<a href="{{ route('complaints.category.index') }}" class="menu-item-link">
					<div class="menu-item">
						<span class="glyphicon glyphicon-list"></span>
						<h4>View Complaints Categories</h4>
					</div>
				</a>
				<a href="{{ route('complaints.category.create') }}" class="menu-item-link">
					<div class="menu-item">
						<span class="glyphicon glyphicon-list"></span>
						<h4>Add Complaints Category</h4>
					</div>
				</a>
		    </div>
		</div>
	</div>
@stop

