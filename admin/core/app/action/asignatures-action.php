<?php

if(isset($_GET["opt"]) && $_GET["opt"]=="add"){
	$a = new AsignatureData();
	$a->code = $_POST["code"];
	$a->name = $_POST["name"];
	$a->add();
	Core::redir("./?view=asignatures&opt=all");
}
else if(isset($_GET["opt"]) && $_GET["opt"]=="update"){
	$a = AsignatureData::getById($_POST["id"]);
	$a->name = $_POST["name"];
	$a->update();
	Core::redir("./?view=asignatures&opt=all");
}
else if(isset($_GET["opt"]) && $_GET["opt"]=="del"){
	$a = AsignatureData::getById($_GET["id"]);
	$a->del();
	Core::redir("./?view=asignatures&opt=all");
}
else if(isset($_GET["opt"]) && $_GET["opt"]=="deltas"){
	$a = AsignationData::getById($_GET["id"]);
	$a->del();
	Core::redir("./?view=teamasignatures&opt=all&id=$_GET[team_id]&period_id=$_GET[period_id]");
}else if(isset($_GET["opt"]) && $_GET["opt"]=="delschedule"){
	$a = ScheduleData::getById($_GET["id"]);
	$a->del();
	Core::redir("./?view=teamasignatures&opt=all&id=$_GET[team_id]&period_id=$_GET[period_id]");
}

?>