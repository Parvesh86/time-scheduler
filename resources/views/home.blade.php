@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="page-body">
        <div class="row">
            <div class="col-12">
                <div class="panel panel-default">
                    <div class="panel-head">
                        <div class="panel-title">
                            <i class="icon-calendar panel-head-icon"></i>
                            <span class="panel-title-text">Events</span>
                        </div>
                        <div class="panel-action">
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#basicModal" class="btn btn-primary btn-pill btn-shadow">
                                Add Event
                            </a>
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

{{-- Add Event Modal --}}
<div class="modal fade" id="basicModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="basicModalLabel">Schedule Events</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <form id="Schedular_Form" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="event_name">Event Title</label>
                                <input type="text" name="event_name" 
                                        class="form-control" id="event_name" 
                                        placeholder="Event Title"
                                        required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="start_time">Start Time</label>
                                <input type="time" name="start_time" 
                                        class="form-control" 
                                        id="start_time"
                                        required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="end_time">End Time</label>
                                <input type="time" 
                                        name="end_time" class="form-control" 
                                        id="end_time" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="event_description">Description</label>
                                <textarea name="event_description" id="event_description" 
                                            class="form-control" cols="30" rows="10" 
                                            style="resize: none" placeholder="Event Description" ></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="col-form-label d-block">Select Week Days</label>
                            <div class="form-group">
                                @foreach ($week_day_array as $item)
                                    <div class="custom-control custom-checkbox custom-checkbox-1 d-inline-block">
                                        <input type="checkbox" class="custom-control-input" name="week_days[]" id="week_day_{{ $item['day'] }}">
                                        <label class="custom-control-label" for="week_day_{{ $item['day'] }}">{{ substr($item['name'],0,3) }}</label>
                                    </div>
                                @endforeach
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
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

        $('#Schedular_Form').on('submit',function(e){
            e.preventDefault()
            let formData = new FormData(this)
            $.ajax({
                url:"{{ route('schedule.event') }}",
                type:'POST',
                processData: false,
                contentType: false,
                success:function(response){
                    if(response.status){
                        console.log(response);
                    }
                }

            })
        })

    </script>
@endsection
