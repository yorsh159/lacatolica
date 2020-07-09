<?php

if(count($_POST)>0){
	$user = new TeamData();
	$user->grade = $_POST["grade"];
	$user->letter = $_POST["letter"];
	
	$user->add();

print "<script>window.location='index.php?view=teams&opt=all';</script>";


}


?>