<?php

include_once "dbconn/variables.php";

 $db = mysqli_connect($server,$user,$pass,$table)
  or die('Error connecting to MySQL server.');
////////////////////////////////////////////////////////////////////////////////////////////////////
/////Book List FUNCTIONS///////////////

//Begin upload file
    if (isset($_POST['upload'])) {
    $fileName = $_FILES['filename']['tmp_name'];
    echo $fileName . "</br>";
    if (is_uploaded_file($_FILES['filename']['tmp_name'])) {
        echo "<h1>" . "File ". $_FILES['filename']['name'] ." uploaded successfully." . "</h1>";
        echo "<h2>Displaying contents:</h2>";
    }
    $handle = fopen($_FILES['filename']['tmp_name'], "r");

    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        // "Account","Transaction Date","Posted Date","No.","Description","Debit","Credit"
        $id = NULL;
        // $account = "Damien\'s Checking * 7128";
        $account = str_replace("'", "\'", $data[0]);
        
        $tdate1 = date_create_from_format('m/d/Y',  $data[1]);
        $tdate = date_format($tdate1, 'Y-m-d');

        //$pdate = $data[2];
        $pdate1 = date_create_from_format('m/d/Y',  $data[2]);
        $pdate = date_format($pdate1, 'Y-m-d');

        $chkno = $data[3];
        $tD = $data[4];
        
        if ($data[0] == "Account"){

        }
        else {
        $import="INSERT into Register(Account,TDate,PDate,CkNo,tD,Debit,Credit,Balance)values('$account','$tdate','$pdate','$chkno','$tD','$debit','$credit','$Balance');";
        echo $import. "</br>";
            if (mysqli_query($db, $import)) {
                echo "File uploaded successfully</br>";
            } else {
                echo "Error uploading file: " . mysqli_error($db). "</br>";
            }
        }

        
    }

    fclose($handle);

    print "Import done";




}
//End upload file

//var_dump($_FILES);







//////////RETURN TO REFERRING PAGE////////////////

if(isset($_SERVER["HTTP_REFERER"])){
   header("Location: {$_SERVER["HTTP_REFERER"]}");
}
?>


</body>
</html> -->