<?php
$inscript = AsignationData::getByTPAT($_POST["teacher_id"],$_POST["period_id"],$_POST["asignature_id"],$_POST["team_id"]);

if($inscript==null){
	$ins = new AsignationData();
	$ins->teacher_id=$_POST["teacher_id"];
	$ins->period_id=$_POST["period_id"];
	$ins->asignature_id=$_POST["asignature_id"];
	$ins->team_id=$_POST["team_id"];
	$ins->add();
	Core::alert("Asignatura cargada exitosamente.");
	Core::redir("./?view=teamasignatures&opt=all&id=$_POST[team_id]&period_id=$_POST[period_id]");
}else{
	Core::alert("Asignatura existente.");
	Core::redir("./?view=teamasignatures&opt=all&id=$_POST[team_id]&period_id=$_POST[period_id]");
}


?>