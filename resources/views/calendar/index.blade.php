@extends('layouts.dashboard')

@section('content')
<div class="container mx-auto px-4 sm:px-8  ">

    <div id="calendar">

    </div>
</div>

<script>
    $(document).ready(function() {
        var interview = <?php echo json_encode($events); ?>;
        // console.log(events);
        
        $('#calendar').fullCalendar({
            header: {
                left: 'prev, next today',
                center:'title',
                right:'month, agendaWeek, agendaDay'
                
            },
            events: interview,
            selectable:true,
            selectHelper:true
        })
    })
</script>

@endsection