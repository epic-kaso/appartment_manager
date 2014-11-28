@extends('......Layouts.application')
@section('content')
    @include('admin.partials.navbar')
	<div class="container">
		<div class="row">
		    <div class="col-sm-12">
		    	<h1>Create Complaints Category</h1>
				<div class="table-menu">
					<span class="btn btn-default">Sort</span>
					<form role="form" class="form-inline" style="display: inline-block">
						<input type="text" placeholder="search" class="form-control form-inline"/>
						<input type="submit" class="btn form-inline" value="Search"/>
					</form>
					<a href="{{ route('complaints.category.index') }}" class="btn btn-default pull-right">All</a>
					</div>
		    </div>
		</div>

		<div class="row">
		    <div class="col-sm-6">
		    	{{ Form::open(['url' => route('complaints.category.store')]) }}
					<div class="form-group">
						{{ Form::label('Name') }}
						{{ Form::text('name',null,['class'=>'form-control']) }}
					</div>


					<div class="form-group">
						{{ Form::label('Description') }}
						{{ Form::textarea('description',null,['class'=>'form-control']) }}
					</div>


					<div class="form-group">
						{{ Form::label('Assign Admin') }}
						{{ Form::select('admin_id',$admins,null,['class'=>'form-control']) }}
					</div>

					<div class="form-group">
						{{ Form::submit('Create Category',['class'=>'btn btn-primary']) }}
					</div>

				{{ Form::close() }}
		    </div>
		</div>
	</div>
@stop

