@extends('app')
@section('content')
	
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">		
					<div class="panel panel-heading">Roles</div>
					<div class="panel-body">
						
						{!! Form::open(['route'=>'admin.roles.index','method'=>'GET','class'=>'navbar-form navbar-left pull-right','role'=>'search']) !!}
				  		<div class="form-group pull-right">
				    		<input type="text" class="form-control" name="search" placeholder="Search">
				    		<button type="submit" class="btn btn-default">Submit</button>
				  		</div>
						{!! Form::close() !!}
						<p><a class="btn btn-default" href="{{route('admin.roles.create')}}" >Nuevo Rol</a></p>
						<div class="pull-left"><p>Hay {!! $roles->total() !!} registros</p></div>
						@include('admin.roles.partials.table')
						{!! $roles->render() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection