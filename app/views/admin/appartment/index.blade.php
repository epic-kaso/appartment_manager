@extends('......Layouts.application')
@section('content')
    @include('admin.partials.navbar')

	<div class="container">
		@include('Layouts.Partials.info')
		<div class="row">
		    <h1>Appartments</h1>

		</div>

		<div class="row">
			<div class="col-sm-4">
				<div class="list-group">
					<a class="list-group-item"
					   href="{{action('AppartmentManager\Controllers\Admin\AppartmentController@getIndex')}}">All
						Appartments</a>
					@foreach($blocks as $block)
						<a class="list-group-item"
						   href="{{action('AppartmentManager\Controllers\Admin\AppartmentController@getIndex',[$block->slug])}}">{{ $block->name }}</a>
					@endforeach
				</div>
			</div>

			<div class="col-sm-8">
				<div class="table-menu">
					<div class="btn-group">
						<a class="btn btn-default" href="{{ URL::current() }}?sort=vacant">Vacant</a>
						<a class="btn btn-default" href="{{ URL::current() }}?sort=occupied">Occupied</a>
					</div>
					<form role="form" class="form-inline" style="display: inline-block">
						<input type="text" placeholder="search" class="form-control form-inline"/>
						<input type="submit" class="btn form-inline" value="Search"/>
					</form>
					<a href="{{ action('AppartmentManager\Controllers\Admin\AppartmentController@getCreate') }}"
					   class="btn btn-primary pull-right">Create</a>
				</div>
				<table class="table table-striped table-bordered">

					@if(isset($appartments) && !empty($appartments))
						<tbody>
						<?php $index = 0; ?>
						@foreach($appartments as $appartment)
							<?php $index++; ?>
							<tr>
								<td>{{ $index }}</td>
								<td><a href="">{{ $appartment->appartment_id }}</a></td>
								{{--<td><a href="">tenant</a>--}}
								{{--{{ $appartment->tenant_name() }}--}}
								{{--</td>--}}
								<td>
									<span class="label label-{{ $appartment->is_vacant ? 'success': 'warning' }}">
										{{ $appartment->is_vacant ? 'Vacant': 'Occupied' }}
									</span>
								</td>
								<td class="action-td">
									<a class="btn btn-default btn-xs" href="#fly-out"><span
												class="glyphicon glyphicon-chevron-down"></span></a>
									<ul class="list-group fly-out">
										<li class="list-group-item"><a class="btn btn-default btn-xs" href=/"">Edit</a>
										</li>
										@if($appartment->is_vacant)
											<li class="list-group-item">
												<a href="{{ action('AppartmentManager\Controllers\Admin\AppartmentController@postDestroy',[$appartment->id]) }}"
												   class="btn btn-danger btn-xs" data-method="post" rel="nofollow"
												   data-confirm="Are you sure?">Delete</a>
											</li>
										@endif
									</ul>
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
	</div>
@stop

