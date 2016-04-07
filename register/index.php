<?php

if(isset($_GET["page"])){
	$page = $_GET["page"];
	include('config/config.php');
	switch($page):
	case "registration":
	define("serialkey",1);
	include('registration/registration_view.php');
	break;
	default:
	header('Location:?page=registration');
	endswitch;
}else{
	header('Location:?page=registration');
}