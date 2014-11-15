@extends('......Layouts.application')
@section('content')
    @include('admin.partials.navbar')

	<div class="container" style="padding-top: 70px;">
		@include('Layouts.Partials.info')
		<div class="row">
		    <h1>Admins</h1>
		    <div class="table-menu">
		        <span class="btn btn-default">Sort</span>
                <form role="form" class="form-inline" style="display: inline-block">
                    <input type="text" placeholder="search" class="form-control form-inline"/>
                    <input type="submit" class="btn form-inline" value="Search"/>
                </form>
                <a href="{{ route('admin.create') }}" class="btn btn-primary pull-right">Create</a>

		    </div>
		</div>

		<div class="row">
		    <table class="table table-striped table-bordered">
            		    <thead>
            		        <tr>
            		            <td>S/N</td>
            		            <td>Name</td>
            		            <td>Email</td>
            		            <td>Phone</td>
            		            <td>Is SuperAdmin</td>
            		        </tr>
            		    </thead>

            		    @if(isset($admins) && !empty($admins))
            		        <tbody>
            		            @foreach($admins as $admin)
            		                <tr>
            		                    <td>{{ $admin->id }}</td>
            		                    <td>{{ $admin->name }}</td>
            		                    <td>{{ $admin->email }}</td>
            		                    <td>{{ $admin->phone }}</td>
            		                    <td>{{ $admin->is_super_admin == true ? 'SUPERADMIN': ''}}</td>
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
            		{{ $admins->links() }}
            	</div>
		</div>
	</div>
@stop

