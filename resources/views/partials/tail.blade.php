<!-- Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.5/js/app.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.pjax/1.9.6/jquery.pjax.min.js"></script>

@script('https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js')
@script('https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js')
@script('https://cdnjs.cloudflare.com/ajax/libs/chosen/1.6.1/chosen.jquery.min.js')

@script(url('media/js/app.js'))

<div class="templates">
	@yield('templates')
</div>

<script>
	$.pjax.defaults.timeout = 2000;

	$('#modal').on('show.bs.modal', function(event) {
	    var link = $(event.relatedTarget);

	    $(this).find('.modal-dialog').load(link.attr('href'));
	});

	$('#modal').on('hidden.bs.modal', function(event)
	{
		$(this).find('.modal-dialog').html('@include('partials.modals.spinner')');
	});
</script>


@yield('tail')

@stack('scripts')