@extends('layouts.main')

@section('title') Create a new session @stop
@section('heading') Create a new session @stop

@section('content')
	{{ BootForm::openHorizontal(4, 8)->action(URL::route('semester.store')) }}

	<div class="row">
		<div class="col-md-6 col-md-offset-3">
				{{ BootForm::text('Full name:&nbsp;', 'full_name')->placeholder('E.g. Session 1 2014') }}
				{{ BootForm::text('Show name:&nbsp;', 'show_name')->placeholder('E.g. 14s1') }}
				{{ BootForm::datePicker('Start Date:', 'start_date') }}
				{{ BootForm::datePicker('End Date:', 'end_date') }}

				{{ BootForm::datePicker('Effective start:', 'eff_start') }}
				{{ BootForm::datePicker('Effective end:', 'eff_end') }}

				{{ BootForm::datePicker('Break start:', 'break_start') }}
				{{ BootForm::datePicker('Break end:', 'break_end') }}
				{{ BootForm::submit('Go', 'btn-success') }}
		</div>
	</div>

	<script>
		$(document).ready(function()
		{
			$('div.date > input').parent().datetimepicker(
			{
				pickTime: false
			});
		});
	</script>

	{{ BootForm::close() }}
@stop
