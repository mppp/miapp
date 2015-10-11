<table class="table table-striped">
	<tr align="center">
		<td>Nombre</td>
		<td>Apellido</td>
		<td>Usuario</td>
		<td>Email</td>
		<td>Permisos rol</td>
		<td>Permisos usuario</td>
		<td>Ultimo ingreso</td>
		<td>Creado</td>
		<td></td>
	</tr>
	@foreach ($users as $user)
	<tr align="center">
		<td>{{ $user->first_name}}</td>
		<td>{{ $user->last_name}}</td>
		<td>{{ $user->username}}</td>
		<td>{{ $user->email }}</td>
		<td>{{ $user->name }}</td>
		<td>
			<div style="display: block;">
			<ul class="list-group">
			<?php $perm = json_decode($user->userpermissions);?>
				@foreach ($perm as $key=>$per)
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
		<?php 
		$fecha = $user->last_login;
		$date = explode(" ",$fecha);
		//echo print_r($date);
		if($date[0]<>""){
			$newDate = date("d-m-Y", strtotime($fecha));
			echo $newDate." ".$date[1];
		}
		
		?></td>
		<td>{{ $user->created_at }}</td>		
		<td>
			<div style="display: inline;"><button class="btn btn-default">Modificar</button></div>
		</td>
	</tr>
	@endforeach
</table>
