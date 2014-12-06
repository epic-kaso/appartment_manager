@extends('......Layouts.application')
@section('content')
    @include('admin.partials.navbar')
	<div class="container">
		<div class="row">
		    <div class="col-sm-12">
		    	<h1>Create Appartments</h1>
				<div class="table-menu">
					<span class="btn btn-default">Sort</span>
					<form role="form" class="form-inline" style="display: inline-block">
						<input type="text" placeholder="search" class="form-control form-inline"/>
						<input type="submit" class="btn form-inline" value="Search"/>
					</form>
					<a href="{{ action('AppartmentManager\Controllers\Admin\AppartmentController@getIndex') }}"
					   class="btn btn-default pull-right">All</a>

				</div>
		    </div>
		</div>

		<div class="row">
			@include('Layouts.Partials.info')
		    <div class="col-sm-6">
				{{ Form::open(['url' => action('AppartmentManager\Controllers\Admin\AppartmentController@postCreate')]) }}
					<div class="form-group">
						{{ Form::label('Block Name') }}
						{{ Form::text('block_name',null,['class'=>'form-control']) }}
					</div>

				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							{{ Form::label('Units Prefix)') }}
							{{ Form::text('unit_prefix',null,['class'=>'form-control','placeholder'=>'eg. A']) }}
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							{{ Form::label('Block Size') }}
							{{ Form::text('block_size',null,['class'=>'form-control','placeholder'=>'Number of Units in Block']) }}
						</div>
					</div>

					</div>


					<div class="form-group">
						{{ Form::submit('Create Appartments',['class'=>'btn btn-primary']) }}
					</div>

				{{ Form::close() }}
		    </div>
		</div>
	</div>
@stop

