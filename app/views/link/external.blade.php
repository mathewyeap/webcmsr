@extends('layouts.course')

@section('heading-middle')
	<i class="glyphicon glyphicon-new-window"></i> {{ HTML::link($link->url) }}
@stop

@section('content')
	<iframe src="{{{ $link->url }}}" width="100%" height="100%" seamless></iframe>
@stop
