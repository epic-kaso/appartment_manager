@extends('......Layouts.application')
@section('content')
    @include('admin.partials.navbar')

	<div class="container">
		@include('Layouts.Partials.info')
		<div class="row">
			<h1>Complaints Categories</h1>
		    <div class="table-menu">
				<a href="{{ route('complaints.category.create') }}" class="btn btn-primary btn-xs pull-right">Add A
					Category</a>
		    </div>
		</div>

		<div class="row">
			<table class="table table-striped">
            		    <thead>
            		        <tr>
            		            <td>S/N</td>
            		            <td>Name</td>
            		            <td>Admin Name</td>
            		        </tr>
            		    </thead>

            		    @if(isset($categories) && !empty($categories))
            		        <tbody>
            		            @foreach($categories as $category)
            		                <tr>
            		                    <td>{{ $category->id }}</td>
            		                    <td><a href="{{ route('complaints.category.edit',['id'=>$category->id]) }}">{{ $category->name }}</a></td>
            		                    <td>{{ $category->admin_name() }}</td>
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
            		{{ $categories->links() }}
            	</div>
		</div>
	</div>
@stop

