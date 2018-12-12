<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8' />
    <link href='https://fullcalendar.io/releases/fullcalendar/3.9.0/fullcalendar.min.css' rel='stylesheet' />
    <link href='https://fullcalendar.io/releases/fullcalendar/3.9.0/fullcalendar.print.min.css' rel='stylesheet' media='print' />
    <script src='https://fullcalendar.io/releases/fullcalendar/3.9.0/lib/moment.min.js'></script>
    <script src='https://fullcalendar.io/releases/fullcalendar/3.9.0/lib/jquery.min.js'></script>
    <script src='https://fullcalendar.io/releases/fullcalendar/3.9.0/fullcalendar.min.js'></script>
    <script>
        $(document).ready(function() { 
            $('#calendar').fullCalendar({ 
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,basicWeek,basicDay'
                },
                defaultDate: new Date(),
                navLinks: true, // can click day/week names to navigate views
                editable: true,
                eventLimit: true, // allow "more" link when too many events
                events: [{
                    title: 'All Day Event',
                    start: '2018-09-12'
                }, ],
                dayRender: function(date, cell) {
                    cell.append('<div style="text-align:center; background-color:blue; color:#fff;padding:2px 0;margin-top:20px;">Add Your Text!</div>');
                },
                eventAfterAllRender: function(view) {
                    var dayEvents = $('#calendar').fullCalendar('clientEvents', function(event) {
                        if (event.end) {
                            var dates = getDates(event.start, event.end);
                            $.each(dates, function(index, value) {
                                var td = $('td.fc-day[data-date="' + value + '"]');
                                td.find('div:first').remove();
                            });
                        } else {
                            var td = $('td.fc-day[data-date="' + event.start.format('YYYY-MM-DD') + '"]');
                            td.find('div:first').remove();
                        }
                    });
                }
            });
        });
    </script>
    <style>
        body {
            margin: 40px 10px;
            padding: 0;
            font-family: "Lucida Grande", Helvetica, Arial, Verdana, sans-serif;
            font-size: 14px;
        }
        
        #calendar {
            max-width: 900px;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <div id='calendar'></div>
</body>

</html>