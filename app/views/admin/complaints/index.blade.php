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
            		            <td>Appartment</td>
            		        </tr>
            		    </thead>

            		    @if(isset($responses) && !empty($responses))

            		        <tbody>
            		            @foreach($responses as $response)
            		                <tr>
            		                    <td>{{ $response->complaint->id }}</td>
            		                    <td><p><a href="{{ route('admin-complaints.show',['id'=>$response->complaint->id]) }}">{{ $response->complaint->description }}</a></p></td>
            		                    <td> {{ $response->complaint->present('complaint_categories')}}</td>
            		                    <td>
            		                        <span class="label label-{{ $response->complaint->is_handled ? 'success': 'warning' }}">
            		                            {{ $response->complaint->is_handled ? 'Handled': 'Not Handled' }}
            		                        </span>
            		                    </td>
            		                    <td>
            		                        {{$response->complaint->tenant->appartment->appartment_id }}
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
            		{{ $responses->links() }}
            	</div>
		</div>
	</div>
@stop

