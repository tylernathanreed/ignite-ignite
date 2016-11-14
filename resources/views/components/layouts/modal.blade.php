@yield('modal.form')

<div class="modal-content">
	@optional('modal.header')
		@yield('modal.header')
	@else
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	 		<h4 class="modal-title" id="modal-label">@yield('modal.heading')</h4>
		</div>
	@endoptional

	@optional('modal.body')
		<div class="modal-body">
			@yield('modal.body')
		</div>
	@endoptional

	@optional('modal.footer')
		<div class="modal-footer">
			@yield('modal.footer')
		</div>
	@else
		<div class="modal-footer">
			<button type="submit" class="btn btn-primary" ajax-form="#modal-form" ajax-success="success">
				<i class="fa fa-check"></i> Save
			</button>
			<button type="button" class="btn btn-danger" data-dismiss="modal">
				<i class="fa fa-times"></i> Cancel
			</button>
		</div>
	@endoptional
</div>

@optional('modal.form')
	{!! Form::close() !!}
@endoptional

@yield('modal.success')

<script>

	$('button[type=submit][ajax-form]').click(function(event) {

		// Determine the Form
		var form = $($(this).attr('ajax-form'));

		// Submit the Request
		$.ajax({
			type: form.attr('method'),
			url:  form.attr('action'),
			data: form.serialize(),
			success: function(response) {
				// Call the Success Handler
				if(window['success'] !== undefined)
					success(response);

				// Close the Modal
				$('#modal').modal('hide');

				// Refresh the Container
				$.pjax.reload($('#modal form').attr('pjax-target'));
			},
			error: function(response) {
				alert('The were an error processing the form');
			}
		});
	});

</script>