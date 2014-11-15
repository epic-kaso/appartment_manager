@extends('......Layouts.application')
@section('content')
    @include('tenant.partials.navbar',compact('tenant'))
	<div class="container" style="padding-top: 70px;">
		<div class="row">
		    <div class="col-sm-12">
		    	<h1>Create Complaint</h1>
		    </div>
		</div>

		<div class="row">
			@include('Layouts.Partials.info')
		    <div class="col-sm-6">
		    	{{ Form::open(['url' => route('complaints.store')]) }}
					<div class="form-group">
						{{ Form::label('Complaint') }}
						{{ Form::textarea('complaint_body',null,['class'=>'form-control','rows'=>'5']) }}
					</div>
					@if(isset($complaints_categories) && !empty($complaints_categories))
						@foreach($complaints_categories as $category)
							<div class="form-group grid-select">
								{{ Form::label('category_ids[]',$category->name) }}
								{{ Form::checkbox('category_ids[]',$category->id) }}<br/>
							</div>
						@endforeach
					@endif

					<div class="form-group">
						{{ Form::submit('Create',['class'=>'btn btn-primary']) }}
					</div>

				{{ Form::close() }}
		    </div>
		</div>
	</div>
@stop

