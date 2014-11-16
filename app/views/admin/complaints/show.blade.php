@extends('......Layouts.application')
@section('content')
    @include('admin.partials.navbar')
	<div class="container" style="padding-top: 70px;">
		<div class="row">
		    <div class="col-sm-12">
		    	<h1>Complaint</h1>
				<div class="table-menu">
				    @if($complaint->is_handled == false)
				        {{ Form::open(['method'=>'PUT']) }}
				        	<input type="submit" class="btn btn-primary" value="Mark As Resolved" />
				        {{ Form::close() }}
                    @else
                        <span class="btn btn-success">Resolved</span>
                    @endif
				</div>
		    </div>
		</div>

		<div class="row">
		    <div class="col-sm-6">
		    	<div class="comment">
		    	    <p>{{ $complaint->description }}</p>
		    	</div>
		    	<div>
		    	    {{ $complaint->present('complaints_categories') }}
		    	</div>
		    </div>
		</div>
	</div>
@stop

