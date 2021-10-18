@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="page-body">
        <div class="row">
            <div class="col-8">
                <div class="panel panel-default">
                    <div class="panel-head">
                        <div class="panel-title">
                            <i class="icon-calendar panel-head-icon"></i>
                            <span class="panel-title-text">Events</span>
                        </div>
                        <div class="panel-action">
                            <a href="#" class="btn btn-primary btn-pill btn-shadow"><i class="icon-plus mr-2"></i> Add Event</a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div id="basic-calendar"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function(){
            CALENDAR.init()
        })

        const CALENDAR = {
            init : () => {
                CALENDAR.loadCalendar()
            },
            loadCalendar : () => {
                $('#basic-calendar').fullCalendar({
                    header: { //Set Header bar values
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,agendaWeek,agendaDay,listWeek'
                    },
                    editable: true,
                    eventLimit: true, // Event Limit
                    navLinks: true,
                    eventClick: function(event, jsEvent, view) { //Event Click Function
                        if (event.url) {
                            window.open(event.url);
                            return false;
                        }
                    }
                });
            }
        }
    </script>
@endsection
