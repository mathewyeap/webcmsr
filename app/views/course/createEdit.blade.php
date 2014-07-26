@extends('layouts.main')

@section ('heading')
	{{ !isset($eCourse) ? 'Add New Course' : 'Edit Course Details' }}
@stop

@section('content')

<div class="row">
	<div class="col-xs-12">
		@if (isset($eCourse))
			{{ BootForm::openHorizontal(3, 6)->put()
				->action(URL::route('course.update', $eCourse->id)) }}

			{{ BootForm::bind($eCourse) }}
		@else
			{{ BootForm::openHorizontal(3, 6)->action(URL::route('course.store')) }}
		@endif

		{{ BootForm::text('Course Code:', 'code')->setControlWidth(3)
			->placeholder('e.g. COMP3311')->required() }}
		{{ BootForm::text('Course Title:', 'title')->placeholder('e.g. Database Systems')
			->required() }}
		{{ BootForm::select('Teaching Term:', 'semester_id', $futureSemesterSelectData) }}
		{{ BootForm::text('Colour Scheme:', 'colour_scheme_id')->setControlWidth(3)
			->placeholder('Choose from panel below') }}
@if (isset($eCourse->colour_scheme_id))
		<script>
			$('#colour_scheme_id').css('background-color', '{{ $eCourse->colourScheme->bg }}');
			$('#colour_scheme_id').css('color', '{{ $eCourse->colourScheme->text }}');
		</script>
@endif
		{{ BootForm::text('Units of Credit:', 'uoc')->defaultValue(6)->setControlWidth(1) }}

		<h2 class="text-center">Colour Panel</h2>

		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				{{ HTML::colourSchemePicker('colour_scheme_id') }}
			</div>
		</div>

		{{ BootForm::submit(!isset($eCourse) ? 
			'Create course' : 'Commit changes', 'btn-success') }}
		{{ BootForm::close() }}

	</div>
</div>


@stop
