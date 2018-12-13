
<!--<nav class="navbar navbar-expand-sm bg-dark navbar-dark left"><nav class="nav flex-column bg-dark navbar-dark">-->

<nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top d-flex flex-row" style="margin:0 width:100%">
<ul class="navbar-nav d-flex mr-auto">
  <a class="navbar-brand" href="../index.php">
  	<img src="../images/Damien.png" alt="Damien" style="width:40px;">
</a>

    <li class="nav-item">
      <a href="register.php" class="nav-link btn btn-link">Register</a>
      <!--<button class="nav-link btn btn-link" id="registerBtn" data-toggle="collapse" data-target="#register" aria-expanded="true" aria-controls="register">Register</a>-->
    </li>
    <li class="nav-item">
      <a href="categories.php" class="nav-link btn btn-link">Categories</a>
      <!--<button class="nav-link btn btn-link" id="categoriesBtn" data-toggle="collapse" data-target="#categories" aria-expanded="true" aria-controls="categories">Categories</a>-->
    </li>
    <li class="nav-item">
      <a href="calendar.php" class="nav-link btn btn-link">Calendar</a>
      <!--<button class="nav-link btn btn-link" id="calendarBtn" data-toggle="collapse" data-target="#calendar" aria-expanded="false" aria-controls="calendar">Calendar</a>-->
    </li>
    <li class="nav-item">
      <a href="reports.php" class="nav-link btn btn-link">Reports</a>
      <!--<button class="nav-link btn btn-link" id="reportsBtn" data-toggle="collapse" data-target="#reports" aria-expanded="false" aria-controls="reports">Reports</a>-->
    </li>
    
    
  </ul>
  <div class="d-flex mr-auto">
  <button type="button" class="btn btn-success" style="display: block; margin: 0 auto;">
            <?php
            $query = "SELECT SUM(Debit) AS debit, SUM(Credit) AS credit FROM Register";
            //$query = "SELECT SUM(Debit + Credit) FROM Register";
            //mysqli_query($db, $query) or die('Error querying database.');
            $result = mysqli_query($db, $query)  or die('Error querying database.');
            while ($row = mysqli_fetch_array($result)) {
              $Balance = round(($row["credit"] + $row["debit"])* 100) / 100;
            echo 'Checking Balance: ' . $Balance;
            }
            ?></button></div>
  <div class="d-flex ml-auto"></div>
    
  
</nav>