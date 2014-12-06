@extends('......Layouts.application')
@section('content')
    @include('admin.partials.navbar')

	<div class="container">
		@include('Layouts.Partials.info')
		<div class="row">
		    <h1>Complaints</h1>
		    <div class="table-menu">
				<div class="pull-right">
					<a href="{{ route('complaints.category.index') }}" class="btn btn-default btn-xs">View
						Categories</a>
					<a href="{{ route('complaints.category.create') }}" class="btn btn-primary btn-xs">Add A
						Category</a>
				</div>
			</div>
		</div>

		<div class="row">
            		    @if(isset($responses) && !empty($responses))
				<?php $index = 0 ?>
				<ul class="list-group" style="margin-top: 10px">
            		            @foreach($responses as $response)
						<?php $index++; ?>
						<li class="list-group-item">
							<div style="
													width: 100%;
													display: inline-table;
												">
								<span class="pull-right">{{ $response->complaint->created_at->diffForHumans() }}</span>
												<span class="pull-left label label-{{ $response->complaint->is_handled ? 'success': 'warning' }}">
													{{ $response->complaint->is_handled ? 'Handled': 'Not Handled' }}
												</span>
							</div>

							<div>
								<p><strong>
										{{ Str::limit($response->complaint->description)  }}
										<a href="{{ route('admin-complaints.show',['id'=>$response->complaint->id]) }}">more</a>
									</strong>
								</p>

								<p>
									<span class="text-muted">Appartment </span>
									{{$response->complaint->tenant->appartment->full_name }},
									<span class="text-muted"> Resident </span>
									{{$response->complaint->tenant->last_name.' '.$response->complaint->tenant->first_name }}
								</p>
								@if($response->complaint->is_handled == FALSE)
									<a href="{{ route('admin-complaints.show',[$response->complaint->id]) }}"
									   class="btn btn-info btn-xs pull-right"
									   data-method="put" rel="nofollow"
									   data-confirm="Are you sure?"
											>Mark As Resolved</a>
								@else
									<span class="btn btn-success btn-xs pull-right">Resolved</span>
								@endif
							</div>
							<div>
								{{ $response->complaint->present('complaint_categories',TRUE)}}
							</div>
						</li>
            		            @endforeach
				</ul>
            		    @else
				<div>
					<p class="text-center">
						<span>Empty</span>
					</p>
				</div>
            		    @endif

            	<div class="bar">
					{{--{{ $responses->links() }}--}}
            	</div>
		</div>
	</div>
@stop

