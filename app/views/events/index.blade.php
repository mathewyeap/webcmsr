@section('title') Course Events @stop

@section('head')
@parent
<link rel="stylesheet" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables_themeroller.css">
<script src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
<script>
	$(document).ready(function() {
		$('#table').dataTable({
			"bJQueryUI": true	
		});	
	});
</script>
@stop

@section('heading') Events for this course @stop

@section('content')

{{
	Datatable::table()
	->addColumn('id', 'name', 'description', 'location', 'capacity')
	->setOptions('bJQueryUI', true)
	->render()
}}

@stop
