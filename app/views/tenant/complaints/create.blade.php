@extends('......Layouts.application')
@section('content')
    @include('tenant.partials.navbar',compact('tenant'))
	<div class="container">
		<div class="row">
		    <div class="col-sm-12">
		    	<h1>Make a new Complain</h1>
		    </div>
		</div>

		<div class="row">
			@include('Layouts.Partials.info')
		    <div class="col-sm-6">
		    	{{ Form::open(['url' => route('tenant-dashboard.complaints.store')]) }}
					<div class="form-group">
						{{ Form::textarea('complaint_body',null,
						['class'=>'form-control','rows'=>'10','placeholder'=>'WRITE YOUR COMPLAINT HERE']) }}
					</div>
					@if(isset($complaints_categories) && !empty($complaints_categories))
						<div class="grid-select">
							@foreach($complaints_categories as $category)
								<div class="form-group">
									<label>
										{{ $category->name }}
										{{ Form::checkbox('category.'.$category->name,$category->id) }}
									</label>
								</div>
							@endforeach
						</div>

					@endif

					<div class="form-group">
						{{ Form::submit('Create',['class'=>'btn btn-appartment btn-block']) }}
					</div>

				{{ Form::close() }}
		    </div>
		</div>
	</div>
@stop

