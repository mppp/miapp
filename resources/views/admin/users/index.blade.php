@extends('app')
@section('content')
	
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">		
					<div class="panel panel-heading">Usuarios</div>
					<div class="panel-body">
						{!! Form::open(['route'=>'admin.users.index','method'=>'GET','class'=>'navbar-form navbar-left pull-right','role'=>'search']) !!}
				  		<div class="form-group pull-right">
				    		<input type="text" class="form-control" name="search" placeholder="Search">
				    		<button type="submit" class="btn btn-default">Submit</button>
				  		</div>
						{!! Form::close() !!}
						<div class="pull-left"><p>Hay {!! $users->total() !!} registros</p></div>
						@include('admin.users.partials.table')
						{!! $users->render() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection