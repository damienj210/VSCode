//window.onload=toBottom;

function toBottom() {

    window.scrollTo(0, document.body.scrollHeight);
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
        var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
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
        date_input1.datepicker(options);
        date_input2.datepicker(options);


    })




});