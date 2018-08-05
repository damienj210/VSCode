<?php
 $q = intval($_GET['q']);
 $r = intval($_GET['r']);

 ?>

<ul class="pagination pagination-sm">
<li class="page-item"><a class="page-link" href="#">Previous</a></li>
<?php
$counts = $r / $q;
  for ($i=0;$i<=$counts;$i++){
    echo '<li class="page-item"><a class="page-link" href="#">'. ($i + 1) .'</a></li>';
  };
?>
 <li class="page-item"><a class="page-link" href="#">Next</a></li>
</ul>
