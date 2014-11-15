@extends('......Layouts.application')
@section('content')
    @include('admin.partials.navbar')

	<div class="container" style="padding-top: 70px;">
		@include('Layouts.Partials.info')
		<div class="row">
		    <h1>Complaints</h1>
		    <div class="table-menu">
		        <span class="btn btn-default">Sort</span>
                <form role="form" class="form-inline" style="display: inline-block">
                    <input type="text" placeholder="search" class="form-control form-inline"/>
                    <input type="submit" class="btn form-inline" value="Search"/>
                </form>
                <a href="{{ route('complaints.create') }}" class="btn btn-primary pull-right">Create</a>

		    </div>
		</div>

		<div class="row">
		    <table class="table table-striped table-bordered">
            		    <thead>
            		        <tr>
            		            <td>S/N</td>
            		            <td>Complaint</td>
            		            <td>Category</td>
            		            <td>Status</td>
            		        </tr>
            		    </thead>

            		    @if(isset($complaints) && !empty($complaints))
            		        <tbody>
            		            @foreach($complaints as $complaint)
            		                <tr>
            		                    <td>{{ $complaint->id }}</td>
            		                    <td><p>{{ $complaint->description }}</p></td>
            		                    <td>{{ '' }}</td>
            		                    <td>
            		                        <span class="label label-{{ $complaint->is_handled ? 'success': 'warning' }}">
            		                            {{ $complaint->is_handled ? 'Handled': 'Not Handled' }}
            		                        </span>
            		                    </td>
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
            		{{ $complaints->links() }}
            	</div>
		</div>
	</div>
@stop

