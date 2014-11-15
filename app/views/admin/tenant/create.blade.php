@extends('......Layouts.application')
@section('content')
    @include('admin.partials.navbar')
	<div class="container" style="padding-top: 70px;">
		<div class="row">
		    <div class="col-sm-12">
		    	<h1>Create Tenant</h1>
				<div class="table-menu">
					<span class="btn btn-default">Sort</span>
					<form role="form" class="form-inline" style="display: inline-block">
						<input type="text" placeholder="search" class="form-control form-inline"/>
						<input type="submit" class="btn form-inline" value="Search"/>
					</form>
					<a href="{{ route('tenant.index') }}" class="btn btn-default pull-right">All</a>

				</div>
		    </div>
		</div>

		<div class="row">
		    <div class="col-sm-6">
		    	{{ Form::open(['url' => route('tenant.store')]) }}
					<div class="form-group">
						{{ Form::label('Last Name') }}
						{{ Form::text('last_name',null,['class'=>'form-control']) }}
					</div>

					<div class="form-group">
						{{ Form::label('First Name') }}
						{{ Form::text('first_name',null,['class'=>'form-control']) }}
					</div>

					<div class="form-group">
						{{ Form::label('Email') }}
						{{ Form::text('email',null,['class'=>'form-control']) }}
					</div>

					<div class="form-group">
						{{ Form::label('Phone') }}
						{{ Form::text('phone',null,['class'=>'form-control']) }}
					</div>

					<div class="form-group">
						{{ Form::label('Appartment') }}
						{{ Form::select('appartment_id',$appartments,null,['class'=>'form-control']) }}
					</div>

					<div class="form-group">
						{{ Form::label('Password') }}
						{{ Form::password('password',['class'=>'form-control']) }}
					</div>

					<div class="form-group">
						{{ Form::label('Password Confirmation') }}
						{{ Form::password('password_confirmation',['class'=>'form-control']) }}
					</div>

					<div class="form-group">
						{{ Form::submit('Create Tenant',['class'=>'btn btn-primary']) }}
					</div>

				{{ Form::close() }}
		    </div>
		</div>
	</div>
@stop

