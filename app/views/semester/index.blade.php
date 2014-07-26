@extends('layouts.pagination')

@section('title') Teaching Terms @stop
@section('heading') Teaching Terms @stop

@section('search-form')
 	{{ BootForm::open()->get()->action(URL::route('semester.index'))->id('search-form')
 		->addClass('form-inline') }}
		{{ BootForm::select('Show term&nbsp;', 'semester', $semesterSelectData)
			->defaultValue(Input::get('semester', '')) }}
		{{ BootForm::select('from year&nbsp;', 'year', $yearSelectData)
			->defaultValue(Input::get('year', '')) }}
		{{ BootForm::submit('Go', 'btn-success') }}
	{{ BootForm::close() }}
@stop

@section('actions')
	{{ HTML::linkRoute('semester.create', '[Add New Session]', null,
		['class' => 'btn btn-primary btn-sm pull-right']) }}
@stop

@section('pagination-thead')
	<th>Full Name</th>
	<th>Start Date</th>
	<th>End Date</th>
	<th>Eff Start</th>
	<th>Eff End</th>
	<th>Mid-term Break</th>
@stop

@section('pagination-tbody')
	@foreach ($pagination as $semester)
		<tr>
			<td>{{{ $semester->full_name }}}</td>
			<td>{{{ $semester->start_date }}}</td>
			<td>{{{ $semester->end_date }}}</td>
			<td>{{{ $semester->eff_start }}}</td>
			<td>{{{ $semester->eff_end }}}</td>
			<td>{{{ $semester->breakString() }}}</td>
		</tr>
	@endforeach
@stop

@section('modals')
@stop
