<div class="form-group">
	<div class="col-md-6 col-md-offset-4">
		<table border="1" style="width: 100%">
			<thead>
				<tr align="center">
					<td>Name</td><td>Permission</td><td>Action</td>
				</tr>
			</thead>
			@foreach ($roles as $role)
				
				<tr align="center">
					<td>{{$role->name}}</td>
					<td>
						<ul>
						@foreach ($role->permissions as $key=>$permissions)
							<li>{{$key}}</li>
						@endforeach
						</ul>		
					</td>
					<td>
					
					{!! Form::checkbox('name', 'value',false) !!}</td>
				</tr>
			@endforeach
		</table>
	</div>
</div>