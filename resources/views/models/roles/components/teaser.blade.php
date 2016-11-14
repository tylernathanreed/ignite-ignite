<tr id="role-{{ $role->id }}" class="role role-{{ $role->id }}">
	<td>{{ $role->display_name }}</td>
	<td>{{ $role->system_name }}</td>
	<td>{{ $role->permissions->count() }}</td>
	<td class="text-center">
		@include('components.actions', [
			'view' => 'models.roles.components.actions'
		])
	</td>
</tr>