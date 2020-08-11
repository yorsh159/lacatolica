<?php


if(Session::exists("person_id") && !empty($_POST)){
    $post_id = 0;
    if($_POST["content"]!=""){
	$post = new PostData();
	$post->content = $_POST["content"];
	$post->receptor_type_id = 1;
	$post->author_ref_id = $_SESSION["person_id"];
	$post->receptor_ref_id = $_SESSION["person_id"];
	$post_id= $post->add();

	}
	Core::redir("./?view=home");
}
?>