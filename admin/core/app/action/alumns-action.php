<?php

if($_GET["opt"] && $_GET["opt"]=="add"){
if(count($_POST)>0){
	$user = new PersonData();
	$user->code = $_POST["code"];
	//$user->password = sha1(md5($_POST["password"]));
	$user->name = $_POST["name"];
	$user->lastname = $_POST["lastname"];
	$user->address = $_POST["address"];
	$user->email = $_POST["email"];
	$user->phone = $_POST["phone"];
	$user->parent_id = $_POST["parent_id"];
	$u = $user->add_alumn();
	print "<script>window.location='index.php?view=alumns';</script>";
}
}
if($_GET["opt"] && $_GET["opt"]=="upd"){

if(count($_POST)>0){
	$user = PersonData::getById($_POST["alumn_id"]);
	$user->name = $_POST["name"];
	$user->lastname = $_POST["lastname"];
	$user->address = $_POST["address"];
	$user->email = $_POST["email"];
	$user->phone = $_POST["phone"];
	$user->user_id = $_SESSION["user_id"];
	$user->parent_id = $_POST["parent_id"];
	$u = $user->update_alumn();
Core::alert("Actualizado Exitosamente!");
print "<script>window.location='index.php?view=alumns';</script>";


}
}
if($_GET["opt"] && $_GET["opt"]=="del"){

$alumn = PersonData::getById($_GET["id"]);
$alumn->del();

Core::redir("./?view=alumns");
}

?>

