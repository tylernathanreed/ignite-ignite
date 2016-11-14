<tr class="permission permission-{{ $permission->id }}">
	<td>{{ $category->name }}</td>
	<td>{{ $permission->display_name }}</td>
	<td>{{ $permission->system_name }}</td>
	<td class="text-center">
		@include('components.actions', [
			'view' => 'models.permissions.components.actions'
		])
	</td>
</tr>