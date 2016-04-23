@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <form id="agents" action="{{ url('match') }}" method="POST" class="form-horizontal" role="form" data-toggle="validator">
                        {!! csrf_field() !!}

                        @foreach ($agents as $agent)
                            <div class="form-group">
                                <label for="{{ str_slug($agent->name, "-") }}" class="col-sm-3 control-label">{{ $agent->name }}:</label>
                                <div class="col-sm-6">
                                    <input type="text" name="{{ str_slug($agent->name, "-") }}" id="{{ str_slug($agent->name, "-") }}" class="form-control"
                                           placeholder="US zip code" data-minlength="5" maxlength="5" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        @endforeach

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-globe"></i> MATCH
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript" src="{{ URL::asset('js/validator.min.js') }}"></script>
    <script>
        $(function () {
        });
    </script>
@stop
