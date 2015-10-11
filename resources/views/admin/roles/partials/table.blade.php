<table class="table table-striped">
	<tr align="center">
		<td>Nombre</td>
		<td>Permisos</td>
		<td>Creado</td>
		<td></td>
	</tr>
	@foreach ($roles as $rol)
	<tr align="center">
		<td>{{ $rol->name}}</td>
		<td>
			
			<div style="display: block;">
			<ul class="list-group">
				@foreach ($rol->permissions as $key=>$per)
					@if($key =='user.create')
						@if($per==true) 
							<li class="">Crear</li>
						@endif
					@endif
					@if($key =='user.update')
						@if($per==true) 
							<li class="">Actualizar</li>
						@endif
					@endif
					@if($key =='user.delete')
						@if($per==true) 
							<li class="">Eliminar</li>
						@endif
					@endif
					@if($key =='user.view')
						@if($per==true) 
							<li class="">Consultar</li>
						@endif
					@endif			
					
				@endforeach
				</ul>
			</div>
		</td>
		<td>
			{{$rol->created_at}}
		</td>
		<td>
			<div style="display: inline;">
				<p style="display: inherit;">
					<a class="btn btn-info" href="{{ route('admin.roles.edit', $rol->id) }}" role="button">Editar</a>
				</p>
			</div>
		</td>
	</tr>
	@endforeach
	
	
</table>