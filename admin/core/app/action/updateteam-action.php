<?php

if(count($_POST)>0){
	$user = TeamData::getById($_POST["team_id"]);
	$user->grade = $_POST["grade"];
	$user->letter = $_POST["letter"];
	
	$user->update();

print "<script>window.location='index.php?view=teams&opt=all';</script>";


}


?>