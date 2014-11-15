@extends('......Layouts.application')
@section('content')

	@include('admin.partials.navbar')

	<div class="container" style="padding-top: 70px;">
		@include('Layouts.Partials.info')
		<div class="row">
		    <h1>Tenants</h1>
		    <div class="table-menu">
		        <span class="btn btn-default">Sort</span>
                <form role="form" class="form-inline" style="display: inline-block">
                    <input type="text" placeholder="search" class="form-control form-inline"/>
                    <input type="submit" class="btn form-inline" value="Search"/>
                </form>
                <a href="{{ route('tenant.create') }}" class="btn btn-primary pull-right">Create</a>

		    </div>
		</div>

		<div class="row">
		    <table class="table table-striped table-bordered">
            		    <thead>
            		        <tr>
            		            <td>S/N</td>
            		            <td>Last Name</td>
            		            <td>First Name</td>
            		            <td>Phone</td>
            		            <td>Email</td>
            		            <td>Appartment</td>
            		        </tr>
            		    </thead>

            		    @if(isset($tenants) && !empty($tenants))
            		        <tbody>
            		            @foreach($tenants as $tenant)
            		                <tr>
            		                    <td>{{ $tenant->id }}</td>
            		                    <td>{{ $tenant->last_name }}</td>
            		                    <td>{{ $tenant->first_name }}</td>
            		                    <td>{{ $tenant->phone }}</td>
            		                    <td>{{ $tenant->email }}</td>
            		                    <td>{{ $tenant->appartment()->appartment_id }}</td>
            		                </tr>
            		            @endforeach
            		        </tbody>
            		    @else
            		        <tbody>
                                    <tr class="text-center">
                                        <td colspan="5"><span>Empty</span></td>
                                    </tr>
                            </tbody>
            		    @endif
            		</table>

            	<div class="bar">
            		{{ $tenants->links() }}
            	</div>
		</div>
	</div>
@stop

