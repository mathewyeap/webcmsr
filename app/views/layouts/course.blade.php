@extends('layouts.base')

@section('title')
	{{{ $_course->code.' '.$_course->semester->show_name.' - '.$_course->title }}}
@stop

@if (isset($_colourScheme))
	@section('colours')
		<style>
			#left-side-menu span, #left-side-menu, .cs-course, .menu-inner {
				background-color: {{{ $_colourScheme->bg }}} !important;
				color: {{{ $_colourScheme->text }}} !important;
			}

			#left-side-menu a {
				color: {{{ $_colourScheme->text }}} !important;
			}

			.ui-sortable-helper {
				background-color: {{{ $_colourScheme->bg_hilight }}}
				color: {{{ $_colourScheme->text_hilight }}}
			}

			.ui-sortable-placeholder {  
			    border: 3px dashed #aaa;  
			    width: 100%;  
			    background: #ccc; 
			   	visibility: visible !important;
			}  
		</style>
	@stop
@endif

@section('menu')
	@include('partials.menus._course')
@stop

@section('run-menu-script')
	<script>
		var $menu = $('#left-side-menu');
		$menu.mmenu({
			classes: "{{ isset($_colourScheme) && H::colourIsDark($_colourScheme->bg) ? '' : 'mm-light' }}",
			position: "left",
			zposition: "back",
			slidingSubmenus: false,
			dragOpen: true,
		});
	</script>
@stop

@section('header')
	<div class="row">
		<div class="col-xs-12 text-center">
			<small>@yield('heading-middle')</small>
			<div class="pull-left">
				<small>{{{ $_course->code.' '.$_course->semester->show_name }}}</small>
			</div>
			<div class="pull-right"><small>{{{ $_course->title }}}</small></div>
		</div>
	</div>
@stop
