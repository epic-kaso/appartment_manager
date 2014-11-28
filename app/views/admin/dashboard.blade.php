@extends('......Layouts.application')
@section('content')
    @include('admin.partials.navbar',compact('admin'))

	<div class="container" >
		<div class="row">
			@include('Layouts.Partials.info')

			<span>Manage Complaints</span> <hr/>
		    <div>
		    	<a href="{{ route('admin-complaints.index') }}" class="menu-item-link">
		    		<div class="menu-item">
						<span class="fa fa-bell"></span>
						<h4>View Complaints</h4>
					</div>
		    	</a>
		    	<a href="{{ route('complaints.category.index') }}" class="menu-item-link">
					<div class="menu-item">
						<span class="fa fa-tasks"></span>
						<h4>View Complaints Categories</h4>
					</div>
				</a>
				<a href="{{ route('complaints.category.create') }}" class="menu-item-link">
					<div class="menu-item">
						<span class="fa fa-plus"></span>
						<h4>Add Complaints Category</h4>
					</div>
				</a>
		    </div>

		    <span>Manage Appartments</span> <hr/>
		    <div>
		    	<a href="{{ route('appartment.index') }}" class="menu-item-link">
					<div class="menu-item">
						<span class="fa fa-building-o"></span>
						<h4>View Appartments</h4>
					</div>
				</a>
				<a href="{{ route('appartment.create') }}" class="menu-item-link">
					<div class="menu-item">
						<span class="fa fa-home"></span>
						<h4>Add New Appartment</h4>
					</div>
				</a>
			</div>

			<span>Manage Tenants</span> <hr/>
			<div>
				<a href="{{ route('tenant.index') }}" class="menu-item-link">
					<div class="menu-item">
						<span class="fa fa-users"></span>
						<h4>View Tenants</h4>
					</div>
				</a>
				<a href="{{ route('tenant.create') }}" class="menu-item-link">
					<div class="menu-item">
						<span class="fa fa-user"></span>
						<h4>Add New Tenant</h4>
					</div>
				</a>
			</div>

			<span>Manage Admin</span> <hr/>
			<div>
				<a href="{{ route('admin.index') }}" class="menu-item-link">
					<div class="menu-item">
						<span class="fa fa-gavel"></span>
						<h4>View Admins</h4>
					</div>
				</a>
				<a href="{{ route('admin.create') }}" class="menu-item-link">
					<div class="menu-item">
						<span class="fa fa-male"></span>
						<h4>Add New Admin</h4>
					</div>
				</a>
		    </div>
		</div>
	</div>
@stop

