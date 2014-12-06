@extends('......Layouts.application')
@section('content')
    @include('tenant.partials.navbar')

	<div class="container">
		@include('Layouts.Partials.info')
		<div class="row">
		    <h1>Complaints</h1>
		    <div class="table-menu">
		        <span class="btn btn-default">Sort</span>
                <form role="form" class="form-inline" style="display: inline-block">
                    <input type="text" placeholder="search" class="form-control form-inline"/>
                    <input type="submit" class="btn form-inline" value="Search"/>
                </form>
				<a href="{{ route('residents.complaints.create') }}" class="btn btn-primary pull-right">Make A
					Complaint</a>

		    </div>
		</div>

		<div class="row">
			<table class="table table-striped">
            		    @if(isset($complaints) && !empty($complaints))
					<ul class="list-group">
            		            @foreach($complaints as $complaint)
							<li class="list-group-item">
								<span class="pull-right">{{ $complaint->created_at->diffForHumans() }}</span>

								<div>
									<p>{{ $complaint->description }}</p>
								</div>
								<div>
									{{ $complaint->present('complaint_categories',true) }}
								</div>
							</li>
            		            @endforeach
					</ul>
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

