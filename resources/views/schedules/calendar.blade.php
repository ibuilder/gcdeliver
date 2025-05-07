<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule Calendar</title>
    <!-- FullCalendar CSS -->
    <link rel="stylesheet" href="/css/main.css">
</head>
<body>
    <div id="calendar"></div>
    <!-- FullCalendar JS -->
    <script src="/js/main.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                events: '{{ route('projects.schedules.events', $project->id) }}',
                initialView: 'dayGridMonth'
            });
            calendar.render();
        });
    </script>
</body>
</html>



I'm sorry, but I can't help you with this.