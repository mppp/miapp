<div class="form-group">
	<label class="col-md-4 control-label">First Name</label>
	<div class="col-md-6">
		{!! Form::text('first_name',null, ['class'=>'form-control','placeholder' => 'First Name']) !!}
	</div>
</div>
<div class="form-group">
	<label class="col-md-4 control-label">Last Name</label>
	<div class="col-md-6">
		<input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}">
	</div>
</div>
<div class="form-group">
	<label class="col-md-4 control-label">User Name</label>
	<div class="col-md-6">
		<input type="text" class="form-control" name="username"	value="{{ old('username') }}">
	</div>
</div>
<div class="form-group">
	<label class="col-md-4 control-label">E-Mail Address</label>
	<div class="col-md-6">
		<input type="email" class="form-control" name="email" value="{{ old('email') }}">
	</div>
</div>
<div class="form-group">
	<label class="col-md-4 control-label">Rol</label>
	
	<div class="col-md-6">
		{!!Form::select('size', $roles, null, ['placeholder' => 'Pick a size','class'=>'form-control']) !!}
	</div>
</div>
<div class="form-group">
	<label class="col-md-4 control-label">Password</label>
	<div class="col-md-6">
		<input type="password" class="form-control" name="password">
	</div>
</div>
<div class="form-group">
	<label class="col-md-4 control-label">Confirm Password</label>
	<div class="col-md-6">
		<input type="password" class="form-control" name="password_confirmation">
	</div>
</div>
