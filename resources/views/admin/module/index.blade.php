@extends('app')
@section('content')
	
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">		
					<div class="panel panel-heading">Modules</div>
					<div class="panel-body">
						{!! Form::open(['route'=>'admin.module.index','method'=>'GET','class'=>'navbar-form navbar-left pull-right','role'=>'search']) !!}
				  		<div class="form-group pull-right">
				    		<input type="text" class="form-control" name="search" placeholder="Search">
				    		<button type="submit" class="btn btn-default">Submit</button>
				  		</div>
						{!! Form::close() !!}
						<div class="pull-left"><p>{!! $modules->total() !!} records</p></div>
						@include('admin.module.partials.table')
						{!! $modules->render() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection