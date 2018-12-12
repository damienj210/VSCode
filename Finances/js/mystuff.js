//window.onload=toBottom;
function toBottom() {
    window.scrollTo(0, document.body.scrollHeight);
}

//changeIntSelect()
function weekAndDay(date) {
    console.log(date);
    correctedDate = parseInt(date, 10) + 86400000;
    console.log(correctedDate);
    var dayName = moment(correctedDate).format("dddd");
    var formattedDate = parseInt(moment(correctedDate).format("DD"), 10);
    var nth = Math.floor(formattedDate / 7) + 1;

    console.log(dayName);
    console.log(formattedDate);
    var opt = document.getElementById('intMonthSelect').options[0];
    opt.value = "";
    opt.text = "";
    var opt = document.getElementById('intMonthSelect').options[1];
    opt.value = "";
    opt.text = "";
    return nth + " " + dayName;
}


function changeIntSelect($val) {
    if ($val === "week") {
        document.getElementById("RecurWeek").style.display = "inline";
    } else {
        document.getElementById("RecurWeek").style.display = "none";
    }
    if ($val === "month") {
        document.getElementById("RecurMonth").style.display = "inline";
        var start = document.getElementById("addtDate").value;
        var dow = document.getElementById("dOw").value;
        var res = start.split("-", 3);
        var res3 = res[2];
        //document.getElementById("intMonthSelect").value = "Monthly on day " + res3;
        var opt = document.getElementById('intMonthSelect').options[0];
        opt.value = "Monthly on day " + res3;
        opt.text = "Monthly on day " + res3;
        var opt = document.getElementById('intMonthSelect').options[1];
        opt.value = "Monthly on the " + dow;
        opt.text = "Monthly on the " + dow;
    } else {
        document.getElementById("RecurMonth").style.display = "none";
    }
}

//changeIntMonthSelect()
function changeIntMonthSelect($val) {
    if ($val === "dayNumber") {
        //document.getElementById("RecurWeek").style.display = "inline";
    } else {
        //document.getElementById("RecurWeek").style.display = "none";
    }
    if ($val === "dayName") {
        //document.getElementById("RecurMonth").style.display = "inline";
    } else {
        //document.getElementById("RecurMonth").style.display = "none";
    }
}


function myFunction() {
    var x = document.getElementById("myDIV");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}

$(function() {
    $("#registerBtn").click(function() {
        $(".navbutton").fadeIn("slow");
    });

    $("#calendarBtn").click(function() {
        $(".navbutton").fadeOut("slow");
    });

    $("#reportsBtn").click(function() {
        $(".navbutton").fadeOut("slow");
    });
    $("#upload1").change(function() {
        //$("#lblupload1").html($("#upload1").value);
        var $fileName = $(this).val();
        //alert($fileName);
        //$("label[for = filename]").show();
        $("label[for = filename]").text($fileName);


    });

    $("#addRecurrence").click(function() {
        //console.log($("#addRecurrence:checked").val());
        if (document.getElementById("addRecurrence").value === "0") { //($("#addRecurrence:checked").val()) {
            document.getElementById("demo").style.display = "inline";
            document.getElementById("addRecurrence").value = "1";
            console.log(document.getElementById("addRecurrence").value);
        } else {
            document.getElementById("demo").style.display = "none";
            document.getElementById("addRecurrence").value = "0";
            console.log(document.getElementById("addRecurrence").value);
        }
    });

});

function checkDate(TDate, index, array) {
    return TDate = "2018-12-03";
}

$(document).ready(function() {


    // datepicker
    var date_input1 = $('input[name="TDate"]'); //our date input has the name "TDate"
    var date_input2 = $('input[name="PDate"]'); //our date input has the name "PDate"
    var date_input3 = $('input[name="RecurEndDate"]'); //our date input has the name "RecurEndDate"
    var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
    $nowDate = new Date();
    $startDate = $('input[name="TDate"]').value;

    var options = {
        format: 'yyyy-mm-dd',
        container: container,
        todayHighlight: true,
        autoclose: true,
        todayBtn: true,
        clearBtn: false,
        defaultViewDate: $startDate,

    };

    date_input1.datepicker(options);
    date_input2.datepicker(options);
    date_input3.datepicker(options);

    $startMonth = "06"; //moment(date).format("MM");
    $endMonth = "12"; //moment(date).format("MM");
    $startYear = "2018"; //moment(date).format("YYYY");
    $endYear = "2020"; //moment(date).format("YYYY");
    var $query = "test.php?p=" + $startMonth + "&q=" + $endMonth + "&r=" + $startYear + "&s=" + $endYear;
    //alert($query);
    var jsonData = $.ajax({
        url: $query,
        dataType: "json",
        async: false
    }).responseText;

    var parsedJSONData = JSON.parse(jsonData);
    console.log(parsedJSONData);



    //initialize the calendar...

    $('#calendar').fullCalendar({
        //themeSystem: 'jquery-ui',
        themeSystem: 'bootstrap4',
        showNonCurrentDates: true,
        //bootstrapFontAwesome: true,
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,listWeek'
        },

        //defaultDate: '2018-03-12',
        navLinks: true, // can click day/week names to navigate views
        editable: true,
        eventLimit: true, // allow "more" link when too many events
        eventDrop: function(event, delta) {
            //alert(event.title + " was dropped on " + event.start.format());
            //var start = $.fullCalendar.formatDate(event.start, "YYYY-MM-DD");
            var start = event.start.format();
            document.getElementById("recordID").value = event.Id;
            document.getElementById("Account").value = event.Account;
            document.getElementById("tDate").value = start;
            //alert(document.getElementById("tDate").value);
            document.getElementById("pDate").value = start;
            //alert(document.getElementById("pDate").value);
            document.getElementById("CkNo").value = event.CkNo;
            document.getElementById("Desc").value = event.tD;
            document.getElementById("Debit").value = event.Debit;
            document.getElementById("Credit").value = event.Credit;
            document.getElementById("Category").value = event.Category;
            //document.getElementById("RecurId").value = event.id;
            // document.getElementById("Balance").value = event.Balance;
            //document.getElementById("frmUpdate").submit(name=update);
            //form.submit(name=update);
            document.getElementById("btnupdate").click();
        },

        //events: 'dbconn/myfeed.php',
        eventSources: [{
                url: 'dbconn/myfeed.php',
                textColor: 'white'
            },
            {
                url: 'dbconn/myfeedFuture.php',
                textColor: '#900C3F',
                //color: '#FFB833'
            }
        ],

        dayRender: function(date, cell) {

            var cellDate = moment(date).format("YYYY-MM-DD");
            var dateBalance = "";
            var dateColor = "";
            for (var i = 0; i < parsedJSONData.length; i++) {
                if (parsedJSONData[i].TDate == cellDate) {
                    //return parsedJSONData[i].Balance;
                    console.log(parsedJSONData[i].TDate + "," + parsedJSONData[i].Balance + "," + parsedJSONData[i].Color);
                    dateBalance = parsedJSONData[i].Balance;
                    dateColor = parsedJSONData[i].Color;
                    // if (dateBalance < 0) {
                    //     dateColor = "#ffb3b3";
                    // }
                    // if (dateBalance < 200) {
                    //     dateColor = "#ffd9b3";
                    // } else {
                    //     dateColor = "#ccd9ff";
                    // }

                }
            };
            //var cellMonth = "12";
            // var cellDay = "11";
            //alert(cellYear + "/" + cellMonth + "/" + cellDay);
            cell.prepend('<span class="selector" style="color:' + dateColor + '"><i><sup>' + dateBalance + '</sup></i></span>');
            //#ffff99 yellow, #ffd9b3 orange, #ffb3b3 pink, #ccd9ff, blue

        },

        eventRender: function(event, element) {
            element.qtip({
                content: {
                    text: event.amt,
                    title: event.title

                },
                position: {
                    target: 'mouse', // Track the mouse as the positioning target
                    adjust: { x: 5, y: 5 } // Offset it slightly from under the mouse
                },
                style: {
                    classes: 'qtip-green qtip-shadow'
                }
            });
        },
        selectable: true,
        selectHelper: true,
        select: function(start, end, allDay) {
            /* var title = prompt('Event Title:');
            var url = prompt('Type Event url, if exits:');
            if (title) {
            var start = $.fullCalendar.formatDate(start, "yyyy-MM-dd HH:mm:ss");
            var end = $.fullCalendar.formatDate(end, "yyyy-MM-dd HH:mm:ss");
            $.ajax({
            url: 'http://localhost:8888/fullcalendar/add_events.php',
            data: 'title='+ title+'&start='+ start +'&end='+ end +'&url='+ url ,
            type: "POST",
            success: function(json) {
            alert('Added Successfully');
            }
            });
            calendar.fullCalendar('renderEvent',
            {
            title: title,
            start: start,
            end: end,
            allDay: allDay
            },
            true // make the event "stick"
            );
            }
            calendar.fullCalendar('unselect'); */
            var dow = $.fullCalendar.formatDate(start, "dddd");
            var dowtest = start;
            //alert('DOW: ' + dow);
            var start = $.fullCalendar.formatDate(start, "YYYY-MM-DD");
            document.getElementById("addtDate").value = start;
            document.getElementById("addpDate").value = start;
            document.getElementById("RecurEndDate").value = start;
            document.getElementById("addCategory").value = "";
            //document.getElementById("dOw").value = Date.parse(start);
            document.getElementById("dOw").value = weekAndDay(Date.parse(start));
            document.getElementById("addRecurrence").checked = false;
            //$('.collapse').collapse('toggle');
            //$('.collapse').collapse();
            //document.getElementById("demo").style.display = "none";
            document.getElementById("btnAdd").click();
            //console.log(weekAndDay(Date.parse(start)));


        },

        eventClick: function(calEvent) {
            //alert('Event: ' + calEvent.title + '\r\nID: ' + calEvent.Id + '\r\nAccount: ' + calEvent.Account + '\r\nTDate: ' + calEvent.TDate + '\r\nPDate: ' + calEvent.PDate + '\r\nCkNo: ' + calEvent.CkNo + '\r\ntD: ' + calEvent.tD + '\r\nDebit: ' + calEvent.Debit + '\r\nCredit: ' + calEvent.Credit + '\r\nCategory: ' + calEvent.Category);
            //alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
            //alert('View: ' + view.name);
            //document.getElementById("btnEdit").click(calEvent.Id, calEvent.Account, calEvent.TDate, calEvent.PDate, calEvent.CkNo, calEvent.tD, calEvent.Debit, calEvent.Credit, calEvent.Category);
            document.getElementById("recordID").value = calEvent.Id;
            document.getElementById("Account").value = calEvent.Account;
            document.getElementById("tDate").value = calEvent.TDate;
            document.getElementById("pDate").value = calEvent.PDate;
            document.getElementById("CkNo").value = calEvent.CkNo;
            document.getElementById("Desc").value = calEvent.tD;
            document.getElementById("Debit").value = calEvent.Debit;
            document.getElementById("Credit").value = calEvent.Credit;
            document.getElementById("Category").value = calEvent.Category;
            //document.getElementById("RecurId").value = calEvent.id;
            // document.getElementById("Balance").value = calEvent.Balance;
            document.getElementById("btnEdit").click();
            //calendar.fullCalendar( ‘rerenderEvents’ );

            // change the border color just for fun
            //$(this).css('border-color', 'red');

        },
        /* eventClick: function(event, element) {
            event.title = "CLICKED!",
            $('#calendar').fullCalendar('updateEvent', event)
        } */
    });
});