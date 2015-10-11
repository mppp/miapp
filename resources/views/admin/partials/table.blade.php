<table class="table table-striped">
	<tr align="center">
		<td>#</td>
		<td>Cedula</td>
		<td>Nombre</td>
		<td>Apellido</td>
		<td>Acciones</td>
	</tr>
	@foreach ($funcionario as $mifuncionario)
	<tr align="center">
		<td>{{ $mifuncionario->personal_id}}</td>
		<td>{{ $mifuncionario->personal_cedula}}</td>
		<td>{{ $mifuncionario->personal_pnombre}}</td>
		<td>{{ $mifuncionario->personal_papellido }}</td>
		<td>
			<div style="display: inline;">
			<p style="display: inherit;"><a class="btn btn-info" href="{{ route('cargo.funcionario.show', $mifuncionario->personal_id) }}" role="button">Abrir nuevo RIC</a></p>
			<p style="display: inherit;"><a class="btn btn-info" href="{{ route('cargo.funcionario.show', $mifuncionario->personal_id) }}" role="button">Listar RIC Creados</a></p>
			</div>
		</td>
	</tr>
	@endforeach
</table>
