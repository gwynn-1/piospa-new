@extends('layout')

@section('content')
    <p>
        This view is loaded from module: {!! config('services') !!}
    </p>
@stop
@section('after_script')
    <script src="{{asset('static/backend/js/user/list.js')}}" type="text/javascript"></script>
@stop