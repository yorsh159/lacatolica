<?php

if(!empty($_POST)){
	$found = BehaviorData::getByATD($_POST["alumn_id"],$_POST["asignation_id"],$_POST["date_at"]);
	if($found==null && $_POST["kind_id"]!=""){
	$assis = new BehaviorData();
	$assis->alumn_id = $_POST["alumn_id"];
	$assis->asignation_id = $_POST["asignation_id"];
	$assis->kind_id = $_POST["kind_id"];
	$assis->date_at = $_POST["date_at"];
	$assis->add();
	}else if($found=!null&&$_POST["kind_id"]!=""){
	$found = BehaviorData::getByATD($_POST["alumn_id"],$_POST["asignation_id"],$_POST["date_at"]);
	
	$found->kind_id = $_POST["kind_id"];
	$found->update();

	}else if($_POST["kind_id"]==""){
	$found = BehaviorData::getByATD($_POST["alumn_id"],$_POST["asignation_id"],$_POST["date_at"]);
		$found->del();
	}
}

?>