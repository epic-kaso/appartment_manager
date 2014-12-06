@extends('Layouts.application')
@section('content')
    @include('admin.partials.navbar',compact('admin'))

	<div class="container" >
		<div class="row">
			@include('Layouts.Partials.info')

			<span class="text-muted">Manage Complaints</span> <hr/>
		    <div>
		    	<a href="{{ route('admin-complaints.index') }}" class="menu-item-link">
		    		<div class="menu-item">
						<span class="fa fa-bell"></span>
						<h5>View Complaints</h5>
					</div>
		    	</a>
		    	<a href="{{ route('complaints.category.index') }}" class="menu-item-link">
					<div class="menu-item">
						<span class="fa fa-tasks"></span>
						<h5>View Complaints Categories</h5>
					</div>
				</a>
				<a href="{{ route('complaints.category.create') }}" class="menu-item-link">
					<div class="menu-item">
						<span class="fa fa-plus"></span>
						<h5>Add Complaints Category</h5>
					</div>
				</a>
		    </div>

		    <span class="text-muted">Manage Appartments</span> <hr/>
		    <div>
				<a href="{{ action('AppartmentManager\Controllers\Admin\AppartmentController@getIndex') }}"
				   class="menu-item-link">
					<div class="menu-item">
						<span class="fa fa-building-o"></span>
						<h5>View Appartments</h5>
					</div>
				</a>
				<a href="{{ action('AppartmentManager\Controllers\Admin\AppartmentController@getCreate') }}"
				   class="menu-item-link">
					<div class="menu-item">
						<span class="fa fa-home"></span>
						<h5>Add New Appartment</h5>
					</div>
				</a>
			</div>

			<span class="text-muted">Manage Residents</span>
			<hr/>
			<div>
				<a href="{{ route('tenant.index') }}" class="menu-item-link">
					<div class="menu-item">
						<span class="fa fa-users"></span>
						<h5>View Residents</h5>
					</div>
				</a>
				<a href="{{ route('tenant.create') }}" class="menu-item-link">
					<div class="menu-item">
						<span class="fa fa-user"></span>
						<h5>Add New Resident</h5>
					</div>
				</a>
			</div>

			<span class="text-muted">Manage Admin</span> <hr/>
			<div>
				<a href="{{ route('admin.index') }}" class="menu-item-link">
					<div class="menu-item">
						<span class="fa fa-gavel"></span>
						<h5>View Admins</h5>
					</div>
				</a>
				<a href="{{ route('admin.create') }}" class="menu-item-link">
					<div class="menu-item">
						<span class="fa fa-male"></span>
						<h5>Add New Admin</h5>
					</div>
				</a>
		    </div>
		</div>
	</div>
@stop

