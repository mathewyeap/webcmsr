@extends('layouts.course')

@section('heading') Menu Preferences @stop

@section('page-info')
	<ul>
		<li>The radio button under <b>Home</b> sets the default content of this frame</li>
		<li>If <b>Home</b> page is not accessible to students, a default welcome page will be loaded</li>
		<li>Check the <b>Expand</b> check box to make the sublinks expanded by default</li>
	</ul>
@stop

@section('head')
@parent

@section('content')
	<div class="row">
		<div class="col-sm-10 col-sm-offset-1">
			<div class="btn-group pull-right">
				<button class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown">
					Add New Link <span class="caret"></span>
				</button>
				<ul class="dropdown-menu" role="menu">
@foreach([['tool', 'glyphicon glyphicon-wrench', 'Pick a tool'],
				['external', 'glyphicon glyphicon-link', 'Link to external URL'],
				['heading', 'glyphicon glyphicon-header', 'Heading']] as $parentLinkType)
					<li><a data-toggle="modal" href="{{ URL::route('course.link.create', [$_course->id, "link_type=$parentLinkType[0]"]) }}" data-target="#"><i class="{{ $parentLinkType[1] }}"></i> {{ $parentLinkType[2] }}</a></li>
@endforeach
				</ul>
			</div>
		</div>
	</div>
	<br>

	<div class="row">
		<div class="col-sm-10 col-sm-offset-1">
			<ol id="menu-outer" class="list-unstyled list-group connected">
				<div class="list-group-item cs-course">
					<div class="row">
						<div class="col-xs-2">Home</div>
						<div class="col-xs-6">Name</div>
						<div class="col-xs-2">Expand</div>
						<div class="col-xs-2 text-right">Action</div>
					</div>
				</div>

				@foreach ($_parentLinks as $parentLink)
				<li class="list-group-item" data-link-id="{{ $parentLink->id }}">
					<div class="row">
						<div class="col-xs-2 home"><input type="radio"></div>

						<div class="col-xs-6">
							{{ isset($parentLink->auth) ? '[ <i class="glyphicon glyphicon-lock"></i> '.$parentLink->auth.' ] - ' : '' }}
							{{{ $parentLink->name }}}
						</div>
						<div class="col-xs-2 expand">
							@if (count($parentLink->subLinks) > 0)
								<input type="checkbox" {{ $parentLink->expand ? 'checked' : '' }}>
							@else
								-
							@endif
						</div>
						<div class="col-xs-2 text-right">
							<a class="btn btn-sm btn-default" data-toggle="modal" href="{{ URL::action('course.link.edit', [$_course->id, $parentLink->id]) }}" data-target="#">
								<i class="glyphicon glyphicon-pencil"></i>
							</a>
							<a class="btn btn-danger btn-sm" data-toggle="modal" href="{{ URL::action('LinkController@getConfirmDelete', [$_course->id, $parentLink->id]) }}" data-target="#"><i class="glyphicon glyphicon-remove"></i></a>
						</div>
					</div>
					
 					<ul class="list-unstyled well-sm menu-inner connected">
						@foreach ($parentLink->subLinks as $subLink)
						<li data-link-id="{{ $subLink->id }}">
							<div class="row">
								<div class="col-xs-2 home"><input type="radio"></div>
								<div class="col-xs-6">
									{{ isset($subLink->auth) ? '[ <i class="glyphicon glyphicon-lock"></i> '.$subLink->auth.' ] - ' : '' }}
									{{{ $subLink->name }}}
								</div>
								<div class="col-xs-4 text-right">
									<a class="btn btn-sm btn-default" data-toggle="modal" href="{{ URL::action('course.link.edit', [$_course->id, $subLink->id]) }}" data-target="#"><i class="glyphicon glyphicon-pencil"></i></a>
									<a class="btn btn-danger btn-sm" data-toggle="modal" href="{{ URL::action('LinkController@getConfirmDelete', [$_course->id, $subLink->id]) }}" data-target="#"><i class="glyphicon glyphicon-remove"></i></a>
								</div>
							</div>
						</li>
						@endforeach
					</ul>
				</li>
				@endforeach
			</ul>
		</div>
	</div>

	<br>
	<br>
	<br>

	<script>
	function sortableStopHandler(event, ui)
	{
		var order = ui.item.parent().children('[data-link-id]').index(ui.item) + 1;
		if (ui.item.parent()[0] !== $('#menu-outer')[0])
		{
		    // To inner menu
		    if (ui.item.has('ul>li').length)
		    {
		    	$(this).sortable('cancel');
		    	return;
		    }
			
			ui.item.removeClass('list-group-item');
		} else
		{
		    // To outer menu
		    ui.item.addClass('list-group-item');
		}

		var url = "{{ url('course/'.$_course->id.'/link') }}" + '/' + ui.item.data('link-id') + '/move';
		var data = { order: order};
		if (event.target !== ui.item.parent()[0])
		{
		    // New parent
		    var parentId = ui.item.parents('[data-link-id]').data('link-id');
		    parentId = typeof(parentId) === 'undefined' ? true : parentId;
		    $.extend(data, { parent: parentId } );
		}

		put(url, data).done(function(data)
		{
			$('li[data-link-id]').addClass('ui-state-disabled');
			location.reload(true);
		});
	}

	$(document).ready(function()
	{
		$('li[data-link-id="{{ $_course->home_id }}"] .home input:radio').prop('checked', true);

		$('.home input:radio').click(function(event)
		{
			$('.home input:radio').not($(this)).filter(':checked').prop('checked', false);
			$('.home input:radio').prop('disabled', true);

			$radio = $(this);
			var url = "{{ route('course.update', [$_course->id]) }}";
			var data = { home_id: $(this).closest('li').data('link-id')};

			put(url, data).done(function(data)
			{
				$radio.prop('checked', true);
				location.reload(true);
			});
		});

		$('.expand input:checkbox').click(function(event)
		{
			var url = "{{ url('course/'.$_course->id.'/link') }}" + '/' + $(this).closest('[data-link-id]').data('link-id');
			var expand = $(this).prop('checked') ? 'true' : 'false';
			var data = { expand: expand };

			put(url, data).done(function(data)
			{
				location.reload(true);
			});
		});

		$('#menu-outer, .menu-inner').sortable(
		{
			items: "li",
			connectWith: '.connected',
			axis: 'y',
			stop: sortableStopHandler
		});
	});
</script>
@stop

@stop

@section('modals')
@stop
