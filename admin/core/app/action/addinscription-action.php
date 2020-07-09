<?php
$inscript = InscriptionData::getByAPT($_POST["alumn_id"],$_POST["period_id"],$_POST["team_id"]);

if($inscript==null){
	$ins = new InscriptionData();
	$ins->alumn_id=$_POST["alumn_id"];
	$ins->period_id=$_POST["period_id"];
	$ins->team_id=$_POST["team_id"];
	$ins->add();
	Core::alert("El alumno se ha esta inscrito exitosamente.");
	Core::redir("./?view=inscriptions");
}else{
	Core::alert("El alumno ya esta inscrito en el grupo y periodo seleccionado.");
	Core::redir("./?view=inscriptions");
}


?>