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
					{!! Form::open(['route'=>'admin.module.store','method'=>'POST','class'=>'form-horizontal']) !!}
						@include('admin.module.partials.fields')
						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">Save</button>
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
	function Confirm(){
		var x = confirm("Confirma que desea guardar?");
		if (x)
			return true;
  		else
			return false;
  	}
@endsection