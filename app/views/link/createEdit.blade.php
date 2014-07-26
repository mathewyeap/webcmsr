@extends('layouts.modal')

@section('modal-title')
	@if (isset($link))
		Editing {{{ $linkType }}} link "{{{ $link->name }}}"
	@else
		Create a new {{{ $linkType }}} link
	@endif
@stop

@section('modal-form-open')
	@if (isset($link))
		{{ BootForm::open()->put()->action(URL::route('course.link.update', [$courseId, $link->id])) }}
		{{ BootForm::bind($link) }}
	@else
		{{ BootForm::open()->action(URL::route('course.link.store', $courseId)) }}
	@endif
@stop

@section('modal-body')
	@if ($linkType === Link::TYPE_TOOL)
		<div class="panel panel-info">
			<div class="panel-heading"><i class="glyphicon glyphicon-wrench"></i> Pick a tool:</div>
			<div class="panel-body">
				@foreach ($_allTools->chunk(4) as $row)
					<div class="row">
						@foreach ($row as $tool)
							<div class="col-md-3">
								{{ Form::radio('tool_id', $tool->id, null, ['id' => "tool-$tool->id", (isset($link) ? 'disabled' : '') => '' ]) }} 
								{{ Form::label("tool-$tool->id", $tool->name) }}
							</div>
						@endforeach
					</div>
				@endforeach
			</div>
		</div>
		<script>
			@if (isset($_link->tool->id))
				$('#tool-{{ $_link->tool->id }}').prop("checked", true);
			@endif
			$('input[type=radio][name=tool_id]').click(function() {
				$('input[name=name]').val($(this).next().text());
			});
		</script>
	@endif
			
	{{ BootForm::text('<i class="glyphicon glyphicon-edit"></i> Name:', 'name')
		->required()
		->placeholder('What will you call the link?')
		->helpBlock('E.g. CSE Website') }}

	{{ BootForm::select('<i class="glyphicon glyphicon-lock"></i> Minimum Authorisation:', 'auth', $authSelectData) }}

	@if ($linkType === Link::TYPE_EXTERNAL)
		{{ BootForm::text('<i class="glyphicon glyphicon-link"></i> URL:', 'url')
			->required()
			->placeholder('http://')
			->helpBlock('E.g. http://www.cse.unsw.edu.au/~jas/') }}
	@endif

	@if ( ! isset($link))
		{{ BootForm::select('Parent Link:', 'parent_id', $parentLinkSelectData) }}
	@endif

@stop
