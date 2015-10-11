@extends('app') 
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Register</div>
				<div class="panel-body">

					@if (count($errors) > 0)
					<div class="alert alert-danger">
						<strong>Whoops!</strong> There were some problems with your input.<br>
						<br>
						<ul>
							@foreach ($errors->all() as $error)
							<li>{{ $error }}</li> @endforeach
						</ul>
					</div>
					@endif
									
					{!! Form::model($roles,['route'=>['admin.roles.update',$roles],'method'=>'PUT']) !!}
							<div class="form-group">
								<label class="col-md-4 control-label control-label">Nombre</label>
								<div class="col-md-6">
									{!! Form::text('name',null,['class'=>'form-control']) !!}
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-md-4 control-label control-label">Permisos</label>
								<div class="col-md-6 checkbox">
									
									<?php 
										$perm = json_decode($roles->permissions);
										$create = $perm->{'user.create'}==true?'checked':'';
										$delete = $perm->{'user.delete'}==true?'checked':'';
										$view 	= $perm->{'user.view'}	==true?'checked':'';
										$update = $perm->{'user.update'}==true?'checked':'';
									?>
									
									<label><input type="checkbox" value="user.create" name="user.create" {!! $create !!}>Crear</label>
									<label><input type="checkbox" value="user.delete" name="user.delete" {!! $delete !!}>Eliminar</label>
							  		<label><input type="checkbox" value="user.view"   name="user.view" {!! $view !!}>Consultar</label>
							  		<label><input type="checkbox" value="user.update" name="user.update" {!! $update !!}>Modificar</label>
								</div>
							</div>
							
							<div class="form-group">
								<div class="col-md-6 col-md-offset-4">
									<button type="submit" class="btn btn-primary" onclick="return confirm('Seguro desea guardar este registro?')">Register</button>
								</div>
							</div>
					{!! Form::close() !!}
					
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('javascript')
	
@endsection