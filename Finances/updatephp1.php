<?php 

include_once "dbconn/variables.php";

 $db = mysqli_connect($server,$user,$pass,$table)
  or die('Error connecting to MySQL server.');
////////////////////////////////////////////////////////////////////////////////////////////////////
/////CALENDAR FUNCTIONS//////////////////

// Begin Add Future record
if (isset($_POST['add_future'])) {
    //$Id = $_POST['Id'];
    //$Account = $_POST['Account'];
    $TDate = $_POST['TDate'];
    $PDate = $_POST['PDate'];
    $CkNo = $_POST['CkNo'];
    $Description = $_POST['Description'];
    $Debit = $_POST['Debit'];
    $Credit = $_POST['Credit'];
    $Category = $_POST['Category'];
    $CurrentBalance = $_POST['CurBal'];

    $addRecurrence = $_POST['addRecurrence'];
    $RecInterval = $_POST['RecInterval'];
    $intSelect = $_POST['intSelect'];
    $IntMonthSelect = $_POST['intMonthSelect'];
    $dOw = $_POST['dOw'];
    $RecurWeekSu = $_POST['RecurWeekSu'];
    $RecurWeekMo = $_POST['RecurWeekMo'];
    $RecurWeekTu = $_POST['RecurWeekTu'];
    $RecurWeekWe = $_POST['RecurWeekWe'];
    $RecurWeekTh = $_POST['RecurWeekTh'];
    $RecurWeekFr = $_POST['RecurWeekFr'];
    $RecurWeekSa = $_POST['RecurWeekSa'];
    $optradio = $_POST['optradio'];
    $RecurEndDate = $_POST['RecurEndDate'];
    $RecurOccurences = $_POST['RecurOccurences'];
    $weeklyRecurrence = $RecurWeekSu+$RecurWeekMo+$RecurWeekTu+$RecurWeekWe+$RecurWeekTh+$RecurWeekFr+$RecurWeekSa;
    $RecurPattern = $RecInterval . "," . $intSelect . "," . $IntMonthSelect . "," . $dOw . "," . $weeklyRecurrence . "," . $optradio . "," . $RecurEndDate . "," . $RecurOccurences . "</br>";


    //echo $addRecurrence . "</br>";
    //echo $RecurPattern;
    

    if ($addRecurrence="1"){
        $Recurrence = "";
        if ($intSelect==="day") {
            if ($optradio === "never"){
                $Recurrence = $RecInterval . "," . $intSelect . ",,,," . $optradio . ",,";
            } 
            else if ($optradio === "on"){
                $Recurrence = $RecInterval . "," . $intSelect . ",,,," . $optradio . "," . $RecurEndDate . ",";
            } 
            else if ($optradio === "after"){
                $Recurrence = $RecInterval . "," . $intSelect . ",,,," . $optradio . ",," . $RecurOccurences;
            }
        } 
        else if ($intSelect==="week") {
            //$Recurrence = "week";
            
            if ($optradio === "never"){
                $Recurrence = $RecInterval . "," . $intSelect . ",,," . $weeklyRecurrence . "," . $optradio . ",,";
            } 
            else if ($optradio === "on"){
                $Recurrence = $RecInterval . "," . $intSelect . ",,," . $weeklyRecurrence . "," . $optradio . "," . $RecurEndDate . ",";
            } 
            else if ($optradio === "after"){
                $Recurrence = $RecInterval . "," . $intSelect . ",,," . $weeklyRecurrence . "," . $optradio . ",," . $RecurOccurences;
            }
        } 
        else if ($intSelect==="month") {
            //$Recurrence = "month";

            if ($optradio === "never"){
                $Recurrence = $RecInterval . "," . $intSelect . "," . $IntMonthSelect  .",,," . $optradio . ",,";
            } 
            else if ($optradio === "on"){
                $Recurrence = $RecInterval . "," . $intSelect . "," . $IntMonthSelect  .",,," . $optradio . "," . $RecurEndDate . ",";
            } 
            else if ($optradio === "after"){
                $Recurrence = $RecInterval . "," . $intSelect . "," . $IntMonthSelect  .",,," . $optradio . ",," . $RecurOccurences;
            }
        } 
        else if ($intSelect==="year") {
            //$Recurrence = "year";
            if ($optradio === "never"){
                $Recurrence = $RecInterval . "," . $intSelect . ",,,," . $optradio . ",,";
            } 
            else if ($optradio === "on"){
                $Recurrence = $RecInterval . "," . $intSelect . ",,,," . $optradio . "," . $RecurEndDate . ",";
            } 
            else if ($optradio === "after"){
                $Recurrence = $RecInterval . "," . $intSelect . ",,,," . $optradio . ",," . $RecurOccurences;
            }
        }
        //echo $Recurrence;
    }
    

    if ($_POST['Credit'] == NULL){
        $Bal = $CurrentBalance + $Debit;
         $query = "INSERT INTO Future (Account, TDate, PDate, CkNo, tD, Debit, Credit, Category, Recur, Recurrence)
VALUES ('Damien\'s Checking * 7128', '$TDate', '$PDate', '$CkNo', '$Description', '$Debit', NULL, '$Category', '$addRecurrence', '$Recurrence')";
         //$query = "UPDATE Register SET TDate='$TDate', PDate='$PDate', CkNo='$CkNo', tD='$Description', Debit='$Debit', Credit=NULL where Id ='$Id'";
    }
    else if ($_POST['Debit'] == NULL){
       $Bal = $CurrentBalance + $Credit;
         $query = "INSERT INTO Future (Account, TDate, PDate, CkNo, tD, Debit, Credit, Category, Recur, Recurrence)
VALUES ('Damien\'s Checking * 7128', '$TDate', '$PDate', '$CkNo', '$Description', NULL, '$Credit', '$Category', '$addRecurrence', '$Recurrence')";
         //$query = "UPDATE Register SET TDate='$TDate', PDate='$PDate', CkNo='$CkNo', tD='$Description', Debit=NULL, Credit='$Credit' where Id ='$Id'";
    }
    else {
       $Bal = $CurrentBalance + $Credit + $Debit;
       $query = "INSERT INTO Future (Account, TDate, PDate, CkNo, tD, Debit, Credit, Category, Recur, Recurrence)
       VALUES ('Damien\'s Checking * 7128', '$TDate', '$PDate', '$CkNo', '$Description', '$Debit', '$Credit', '$Category', '$addRecurrence', '$Recurrence')";
    }

    //echo $query." </br>";
   
   
     if (mysqli_query($db, $query)) {
        echo "Record added successfully";
    } else {
        echo "Error adding record: " . mysqli_error($db);
    }
}
// End Add record

?>
