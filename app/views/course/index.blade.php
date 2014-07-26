@extends('layouts.pagination')

@section('title') Course Listing @stop
@section('heading') WebCMS Courses @stop

@section('search-form')
  {{ BootForm::open()->get()->action(URL::route('course.index'))->id('form1')
    ->addClass('form-inline') }}
    {{ BootForm::text('Courses like:&nbsp;', 'course_patt')
      ->defaultValue(Input::get('course_patt', '[Anything]')) }}
    {{ BootForm::select('during:&nbsp;', 'semester', $semesterSelectData)
      ->defaultValue(Input::get('semester', '[Current]')) }}
    {{ BootForm::text('taught by:&nbsp;', 'owner_patt')
      ->defaultValue(Input::get('owner_patt', '[Anyone]')) }}
    {{ BootForm::submit('Go', 'btn-success') }}
  {{ BootForm::close() }}
@stop

@if (Permission::hasMinRole(Permission::ROLE_SYSTEM_ADMIN))
  @section('actions')
    {{ HTML::linkRoute('course.create', '[Add New Course]', null, 
      ['class' => 'btn btn-primary btn-sm pull-right']) }}
  @stop
@endif

@section('pagination-thead')
  <th>Code</th>
  <th>Term</th>
  <th>Title</th>
  <th>Convenor</th>
  {{ Permission::hasMinRole(Permission::ROLE_SYSTEM_ADMIN) ? '<th>Action</th>' : '' }}
@stop

@section('pagination-tbody')
  @foreach ($pagination as $course)
    <tr>
      <td>{{ HTML::linkRoute('course.show', $course->code, $course->id) }}</td>
      <td>{{{ $course->term }}}</td>
      <td>{{{ $course->title }}}</td>
      <td>{{{ $course->lic }}}</td>

      @if (Permission::hasMinRole(Permission::ROLE_SYSTEM_ADMIN))
        <td>
          <a class="btn btn-default btn-sm" href="{{ URL::route('course.edit', [$course->id]) }}"><i class="glyphicon glyphicon-pencil"></i></a>

          <a class="btn btn-danger btn-sm" data-toggle="modal" href="{{ action('CourseController@getConfirmDelete', [$course->id]) }}" data-target="#modal"><i class="glyphicon glyphicon-remove"></i></a>
        </td>
      @endif
    </tr>
  @endforeach
@stop

@section('modals')
@stop