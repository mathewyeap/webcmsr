@yield('modal-form-open')

@ifSectionFilled('modal-title')
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h4 class="modal-title">@yield('modal-title')</h4>
	</div>
@endif

@ifSectionFilled('modal-body')
	<div class="modal-body">
		@yield('modal-body')
	</div>
@endif

<div class="modal-footer">
	{{ Form::button('Close', ['data-dismiss' => 'modal', 'class' => 'btn btn-default']) }}
	@section('modal-submit-button')
		{{ Form::button('Save changes', ['type' => 'submit', 'class' => 'btn btn-primary']) }}
	@show
</div>

@ifSectionFilled('modal-form-open')
	{{ BootForm::close() }}
@endif
