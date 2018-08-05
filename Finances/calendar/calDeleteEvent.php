<?php
$sql = "DELETE from Register WHERE id=".$id;
$q = $bdd->prepare($sql);
$q->execute();
?>