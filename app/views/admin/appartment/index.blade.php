@extends('......Layouts.application')
@section('content')
    @include('admin.partials.navbar')

	<div class="container" style="padding-top: 70px;">
		@include('Layouts.Partials.info')
		<div class="row">
		    <h1>Appartments</h1>
		    <div class="table-menu">
		        <span class="btn btn-default">Sort</span>
                <form role="form" class="form-inline" style="display: inline-block">
                    <input type="text" placeholder="search" class="form-control form-inline"/>
                    <input type="submit" class="btn form-inline" value="Search"/>
                </form>
                <a href="{{ route('appartment.create') }}" class="btn btn-primary pull-right">Create</a>

		    </div>
		</div>

		<div class="row">
		    <table class="table table-striped table-bordered">
            		    <thead>
            		        <tr>
            		            <td>S/N</td>
            		            <td>Appartment Id</td>
            		            <td>Tenant</td>
            		            <td>Vacancy</td>
            		        </tr>
            		    </thead>

            		    @if(isset($appartments) && !empty($appartments))
            		        <tbody>
            		            @foreach($appartments as $appartment)
            		                <tr>
            		                    <td>{{ $appartment->id }}</td>
            		                    <td>{{ $appartment->appartment_id }}</td>
            		                    <td>{{ $appartment->tenant_name() }}</td>
            		                    <td>
            		                        <span class="label label-{{ $appartment->is_vacant ? 'success': 'warning' }}">
            		                            {{ $appartment->is_vacant ? 'Vacant': 'Occupied' }}
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
            		{{ $appartments->links() }}
            	</div>
		</div>
	</div>
@stop

