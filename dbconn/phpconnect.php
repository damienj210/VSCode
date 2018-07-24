<?php
//Step1
 $db = mysqli_connect('localhost','root','Krsres3&krs','mysql')
   or die('Error connecting to MySQL server.');
 ?>
 
 <html>
  <head>
  </head>
  <body>
  <h1>PHP connect to MySQL</h1>
 
 <?php
 //Step2
 $query = "SELECT * FROM user";
 mysqli_query($db, $query) or die('Error querying database.');
 
 //Step3
 $result = mysqli_query($db, $query);
 $row = mysqli_fetch_array($result);
 
 while ($row = mysqli_fetch_array($result)) {
  echo 'User: ' . $row['User'] . ' Host: ' . $row['Host'] . ' Password Expired: ' . $row['password_expired'] . ' Password Last Changed: ' . $row['password_last_changed'] .'<br />';
 }
 //Step 4
 mysqli_close($db);
 ?>
 
 </body>
 </html>