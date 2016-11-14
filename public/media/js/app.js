$(document).ready(function() {
	$('table[data-toggle=data-table]').DataTable();

	$("select[data-toggle=multiselect]").chosen();
});

$(document).on('pjax:success', function() {
  $('table[data-toggle=data-table]').not('.dataTable').DataTable();
});