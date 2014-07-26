@section('title') Students in Course @stop

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

@section('content')

<div class="title">List of students in this course</div>

{{
	Datatable::table()
	->addColumn('id', 'path', 'display_name', 'mime_type', 'uploader', 'size', 'created_at')
	->setOptions('bJQueryUI', true)
	->render()
}}

@stop
