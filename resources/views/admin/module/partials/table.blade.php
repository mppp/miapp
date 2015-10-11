<table class="table table-striped">
	<tr align="center">
		<td>Module</td>
		<td>Created at</td>
		<td></td>
	</tr>
	@foreach ($modules as $module)
	<tr align="center">
		<td>{{$module->name}}</td>
		<td>{{$module->created_at}}</td>		
		<td>
			<p style="display: inherit;">
				<a class="btn btn-info" href="{{ route('admin.module.edit', $module->id) }}" role="button">Edit</a>
				<a class="btn btn-info" href="{{ route('admin.module.show', [$module->id,'permission'=>'false']) }}" role="Delete">Delete</a>
				<a class="btn btn-info" href="{{ route('admin.module.show', [$module->id,'permission'=>'true']) }}" role="Delete">Permisos</a>
			</p>
		</td>
	</tr>
	@endforeach
</table>
