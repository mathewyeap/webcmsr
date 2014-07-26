@section('title')
File upload
@stop

@section('head')
@parent
<script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
<script>
$(document).ready(function() {

	tinymce.init({
		selector: 'textarea',
		plugins: [
			"advlist autolink lists link image charmap print preview anchor",
			"searchreplace visualblocks code fullscreen",
			"insertdatetime media table contextmenu paste"
		],
	});
});
</script>
@stop

@section('content')

<div class="title">Upload File</div>

<div style="border: solid 1px black; padding: 10px">
{{ Form::open(['route' => ['course.upload.store', $course->id], 'files' => true]) }}
	{{ Form::label('path', 'Upload folder') }} 
	{{ Form::select('path', [
		'lectures' => 'Lectures',
		'tutorials' => 'Tutorials',
		'labs' => 'Labs' ])}}<br><br>
	{{ Form::file('upload') }}<br><br>
	{{ Form::submit() }}
{{ Form::close() }}
</div>

@stop
