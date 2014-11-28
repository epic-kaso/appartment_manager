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
					<a href="{{ route('appartment.index') }}" class="btn btn-default pull-right">All</a>

				</div>
		    </div>
		</div>

		<div class="row">
		    <div class="col-sm-6">
		    	{{ Form::open(['url' => route('appartment.store')]) }}
					<div class="form-group">
						{{ Form::label('Block Name') }}
						{{ Form::text('block_name',null,['class'=>'form-control']) }}
					</div>


					<div class="form-group">
						{{ Form::label('Block Size (Number of Units in Block)') }}
						{{ Form::text('block_size',null,['class'=>'form-control']) }}
					</div>

					<div class="form-group">
						{{ Form::submit('Create Appartment',['class'=>'btn btn-primary']) }}
					</div>

				{{ Form::close() }}
		    </div>
		</div>
	</div>
@stop

