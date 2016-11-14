<tr id="transaction-category-{{ $category->id }}" class="transaction-category">
	<td rel="display_name">{{ $category->display_name }}</td>
	<td rel="system_name">{{ $category->system_name }}</td>
	<td rel="actions" class="text-center">
		@include('components.actions', [
			'view' => 'models.budget.transaction-categories.components.actions'
		])
	</td>
</tr>