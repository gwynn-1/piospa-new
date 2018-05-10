@extends('layout')
@section('page_subheader')
    @include('components.subheader', ['title' => 'Lịch hẹn'])
@stop
@section('content')
    <div class="m-portlet" id="m_portlet">
        <div class="m-portlet__head">
            <div class="m-portlet__head-tools">
                <ul class="m-portlet__nav">
                    <li class="m-portlet__nav-item">
                        <a href="#" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air">
								<span>
									<i class="la la-plus"></i>
									<span>Add Event</span>
								</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="m-portlet__body">
            <div id="m_calendar"></div>
        </div>
    </div>
@stop
@section('after_script')
    <script>
        var time_event=[
            @foreach($LIST as $list_item)
            {
                appointment_id:"{{$list_item->appointment_id}}",
                title:"{{$list_item->Services->service_name}}",
                start:"{{$list_item->start_time}}",
                description:"{{$list_item->description}}",
                end:"{{$list_item->end_time}}",
                className: "m-fc-event--danger m-fc-event--solid-warning"
            },
            @endforeach
        ];
    </script>
    <script src="{{asset('static/backend/js/admin/appointment/my-calendar.js')}}"></script>
@stop