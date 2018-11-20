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
        opt.value = "Monthly on the " + res3 + "day";
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

    $(document).ready(function() {
        var date_input1 = $('input[name="TDate"]'); //our date input has the name "date"
        var date_input2 = $('input[name="PDate"]'); //our date input has the name "date"
        var date_input3 = $('input[name="RecurEndDate"]'); //our date input has the name "date"
        var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
        $nowDate = new Date();
        /* if ($('input[name="TDate"]') == "") {
            alert("date is blank");
            $nowDate = new Date();
            $startDate = nowDate.getFullYear() + '-' + (nowDate.getMonth() + 1) + '-' + nowDate.getDate();
            alert("new start date = " + $startDate);
        } else if ($('input[name="TDate"]') == null) {
            alert("date is null");
            $nowDate = new Date();
            $startDate = nowDate.getFullYear() + '-' + (nowDate.getMonth() + 1) + '-' + nowDate.getDate();
            alert("new start date = " + $startDate);
        } else { */
        $startDate = $('input[name="TDate"]');
        /* } */
        var options = {
            format: 'yyyy-mm-dd',
            container: container,
            todayHighlight: true,
            autoclose: true,
            todayBtn: true,
            clearBtn: true,
            defaultViewDate: $startDate
        };
        var options2 = {
            format: 'yyyy-mm-dd',
            container: container,
            todayHighlight: true,
            autoclose: true,
            todayBtn: true,
            clearBtn: true,
            defaultViewDate: $startDate
        };
        date_input1.datepicker(options);
        date_input2.datepicker(options);
        date_input3.datepicker(options2);


    })




});