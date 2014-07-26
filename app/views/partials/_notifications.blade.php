@foreach ([
    ['success', 'success', 'glyphicon glyphicon-ok'],
    ['error', 'danger', 'glyphicon glyphicon-exclamation-sign'],
    ['warning', 'warning', 'glyphicon glyphicon-warning-sign'],
    ['info', 'info', 'glyphicon glyphicon-info-sign']] as $alert)

    @if ($message = Session::get($alert[0], isset(${$alert[0]}) ? ${$alert[0]} : null ))
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <div class="alert alert-{{ $alert[1] }} alert-block">
                	<button type="button" class="close" data-dismiss="alert">&times;</button>
                    <h4><i class="{{ $alert[2] }}"></i> {{ ucfirst($alert[0]) }}</h4>
                    @if(is_array($message))
                        <ul>
                        @foreach ($message as $m)
                            <li>{{{ $m }}}</li>
                        @endforeach
                        </ul>
                    @else
                        {{{ $message }}}
                    @endif
                </div>
            </div>
        </div>
    @endif

@endforeach
