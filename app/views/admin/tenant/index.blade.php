@extends('......Layouts.application')
@section('content')

	@include('admin.partials.navbar')

	<div class="container">
		@include('Layouts.Partials.info')
		<div class="row">
			<h1>Residents</h1>
		    <div class="table-menu">
		        <span class="btn btn-default">Sort</span>
                <form role="form" class="form-inline" style="display: inline-block">
                    <input type="text" placeholder="search" class="form-control form-inline"/>
                    <input type="submit" class="btn form-inline" value="Search"/>
                </form>
				<a href="{{ route('tenant.create') }}" class="btn btn-primary btn-xs pull-right">Add A New Resident</a>

		    </div>
		</div>

		<div class="row">
			<table class="table table-striped">
            		    @if(isset($tenants) && !empty($tenants))
            		        <tbody>
							<?php $index = 0 ?>
            		            @foreach($tenants as $tenant)
									<?php $index++; ?>
            		                <tr>
										<td>{{ $index }}</td>
										<td>
											<span>{{ $tenant->last_name }}</span>
											<span>{{ $tenant->first_name }}</span><br/>
											{{ $tenant->phone }},<br/>
											{{ $tenant->email }}
										</td>
										<td>
											<label>Appartment: </label><br/>
											{{ $tenant->appartment->full_name }}
										</td>
										<td>
											<a class="btn btn-default btn-xs" href=/"">Edit</a> &nbsp;
											<a href="{{ route('tenant.destroy',[$tenant->id]) }}"
											   class="btn btn-danger btn-xs" data-method="delete" rel="nofollow"
											   data-confirm="Are you sure?">Delete</a>
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
            		{{ $tenants->links() }}
            	</div>
		</div>
	</div>
@stop

