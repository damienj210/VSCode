<?php
include_once "dbconn/variables.php";
$db = mysqli_connect($server,$user,$pass,$table)
   or die('Error connecting to MySQL server.');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Checking Register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link href='../Finances/css/fullcalendar.css' rel='stylesheet'/>
  <link href='../Finances/css/fullcalendar.print.css' rel='stylesheet' media='print'/>
  <link href='https://code.jquery.com/ui/1.12.1/themes/cupertino/jquery-ui.css' rel='stylesheet' />
  <link href='https://use.fontawesome.com/releases/v5.0.6/css/all.css' rel='stylesheet'>
  <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' rel='stylesheet' />
  <link type="text/css" rel="stylesheet" href="../Finances/css/jquery.qtip.css" />
  <link href='../Finances/css/mystuff.css' rel='stylesheet'/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src='../Finances/js/moment.js'></script>
  <script src='../Finances/js/jquery.js'></script>
  <script src='../Finances/js/fullcalendar.js'></script>
  <script src="../Finances/js/jquery.qtip.js"></script>
  <script src="../Finances/js/popover.js"></script>
  <script src="../Finances/js/mystuff.js"></script>
  <!-- Bootstrap Date-Picker Plugin -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
   <!-- SimplePagination Plugin -->
   <script type="text/javascript" src="./js/simplepagination.js"></script>
  <link rel="stylesheet" href="./css/simplepagination.css"/>
  

  
</head>
<body>

<?php

$query = "SELECT * FROM Register ORDER BY Id ASC";
$result = mysqli_query($db, $query) or die('Error querying database.');

?>

<table class="table table-striped table-hover tableFixHead">
<thead>
<tr>
<th>ID#</th>
<th>Transaction Date</th>
<th>Check No</th>
<th>Description</th>
<th>Category</th>
<th>Debit</th>
<th>Deposit</th>
<th>Balance</th>
<th></th>
</tr>
</thead>
<tbody>
<?php


 $DebitTot = 0;
 $CreditTot = 0;
 $resultsArray = [];
    while ($row = mysqli_fetch_assoc($result)){
		$DebitTot += $row['Debit'];
		$CreditTot += $row['Credit'];
		$RunTot = $CreditTot + $DebitTot;
		array_push($resultsArray, array($row['Id'], $row['Account'], $row['TDate'], $row['PDate'], $row['CkNo'], $row['tD'], $row['Category'], $row['Debit'], $row['Credit'], $RunTot));
	}
	$reverse=array_reverse($resultsArray);
	$reverse_length = count($reverse);
	for ($x = 0; $x < $reverse_length; $x++)
	{       
	   echo '<tr class="divbutton">';
	   for ($i = 0; $i < 10; $i++)
	   {
		   if ($i == 7)
		   {
			   if ($reverse[$x][$i] == "0.00")
			   {
				   echo '<td class="text-danger"></td>';
			   }
			   else 
			   {
				   echo '<td class="text-danger">' . $reverse[$x][$i] . '</td>';
			   }
		   }
		   else if ($i == 8)
		   {
			   if ($reverse[$x][$i] == "0.00")
			   {
				   echo '<td></td>';
               }
			   else 
			   {
				   echo '<td>' . $reverse[$x][$i] . '</td>';
               }

		   }
		   else if ($i == 1)
		   {

		   }
		   else if ($i == 3)
		   {
			   
		   }
		   else 
		   {
			   echo '<td>' . $reverse[$x][$i] . '</td>';
		   }
		}
		echo '<td><button type="button" class="btn btn-primary btn-sm btn-hidden" id="btn' . $reverse[$x][0] . '" data-toggle="modal" data-target="#modalEdit' . $reverse[$x][0] . '">Edit</button>';
		echo '</tr>';

				//<!--modal Edit-->
				echo '<div class="modal fade" id="modalEdit' . $reverse[$x][0] . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">';
				echo '<div class="modal-dialog" role="document">';
				  echo '<div class="modal-content">';
					echo '<div class="modal-header">';
					  echo '<h5 class="modal-title" id="exampleModalLabel">Edit Transaction</h5>';
					  echo '<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
						echo '<span aria-hidden="true">&times;</span>';
					  echo '</button>';
					echo '</div>';
					echo '<div class="modal-body">';
						echo '<form action="updatephp.php" method="post">';
						echo '<div class="form-group row">';
						echo '<label for="recordID' . $reverse[$x][0] . '" class="col-sm-4 col-form-label">RecordID:</label>';
						   echo '<div class="col-sm-8">';
						echo '<input type="text" class="form-control-plaintext" name="Id" id="recordID' . $reverse[$x][0] . '" readonly value="' . $reverse[$x][0] . '">';
						   echo '</div>';
						echo '<label for="Account' . $reverse[$x][0] . '" class="col-sm-4 col-form-label">Account:</label>';
						   echo '<div class="col-sm-8">';
						echo $reverse[$x][1];
						//echo '<input type="text" class="form-control-plaintext" name="Account" id="Account' . $row["Id"] . '" readonly value="' . $row["Account"] . '">';
						   echo '</div>';
						echo '</div>';
						echo '<div class="form-group row">';
						echo '<label for="tDate' . $reverse[$x][0] . '" class="col-sm-4 col-form-label control-label">Transaction Date:</label>';
						   echo '<div class="col-sm-8">';
						echo '<input type="date" class="form-control" name="TDate" id="tDate' . $reverse[$x][0] . '" value="' . $reverse[$x][2] . '">';
						   echo '</div>';
						echo '<label for="pDate' . $reverse[$x][0] . '" class="col-sm-4 col-form-label control-label">Posted Date:</label>';
						   echo '<div class="col-sm-8">';
						echo '<input type="date" class="form-control" name="PDate" id="pDate' . $reverse[$x][0] . '" value="' . $reverse[$x][3] . '">';
						   echo '</div>';
						echo '<label for="CkNo' . $reverse[$x][0] . '" class="col-sm-4 col-form-label">Check #:</label>';
						   echo '<div class="col-sm-8">';
						echo '<input type="text" class="form-control" name="CkNo" id="CkNo' . $reverse[$x][0] . '" value="' . $reverse[$x][4] . '">';
						   echo '</div>';
						echo '<label for="Desc' . $reverse[$x][0] . '" class="col-sm-4 col-form-label">Description:</label>';
						   echo '<div class="col-sm-8">';
						echo '<input type="text" class="form-control" name="Description" id="Desc' . $reverse[$x][0] . '" value="' . $reverse[$x][5] . '">';
						   echo '</div>';
						echo '<label for="Debit' . $reverse[$x][0] . '" class="col-sm-4 col-form-label">Debit:</label>';
						   echo '<div class="col-sm-8">';
						echo '<input type="text" class="text-danger form-control" name="Debit" id="Debit' . $reverse[$x][0] . '" value="' . $reverse[$x][7] . '">';
						   echo '</div>';
						echo '<label for="Credit' . $reverse[$x][0] . '" class="col-sm-4 col-form-label">Deposit:</label>';
						   echo '<div class="col-sm-8">';
						echo '<input type="text" class="form-control" name="Credit" id="Credit' . $reverse[$x][0] . '" value="' . $reverse[$x][8] . '">';
						   echo '</div>';
						echo '<label for="Category' . $reverse[$x][0] . '" class="col-sm-4 col-form-label">Category:</label>';
						   echo '<div class="col-sm-8">';
						echo '<select class="form-control" name="Category" id="Category' . $reverse[$x][0] . '" value="' . $reverse[$x][6] . '">';
						$Catquery = "SELECT * FROM Categories";
						$CatResult = mysqli_query($db, $Catquery) or die('Error querying database.');
						while ($CatRow = mysqli_fetch_array($CatResult)) {
						  if ($CatRow["Category"] == $reverse[$x][6]){
							echo '<option value="'. $CatRow["Category"] . '" selected>'. $CatRow["Category"] . '</option>';
						  }
						  else {
							echo '<option value="'. $CatRow["Category"] . '">'. $CatRow["Category"] . '</option>';
						  }
						}
						echo '</select>';
						   echo '</div>';
						echo '</div>';
					echo '<div class="modal-footer">';
					  echo '<button type="submit" class="float-left btn btn-primary" name="update" value="update">Save changes</button>';
					  echo '<button type="button" class="float-left btn btn-secondary" data-dismiss="modal">Cancel</button>';
					  echo '<button type="submit" class="float-right btn btn-danger" name="delete" value="delete" onclick="form.submit(name=delete)">Delete</button>';
	
					  echo '</div>';
						echo '</form>';
				  echo '</div>';
				echo '</div>';
			  echo '</div>';
			  echo '</div>';
			  //<!--end modal Edit-->
	}

?>
</tbody></table>
</body>
</html>




