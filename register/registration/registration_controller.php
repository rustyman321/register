<?php
if(serialkey !== 1){
    header("location:../?page=registration");
}
require_once '../config/config.php';

if(isset($_POST['submit']))
{

	$pin = trim($_POST['pin']);
	$fname = trim($_POST['fname']);
	$lname = trim($_POST['lname']);
	$title= trim($_POST['title']);
	$citizenship = trim($_POST['citizenship']);
	$gender = trim($_POST['gender']);
	$comment = trim($_POST['comment']);

	if($act->validate($pin)) 
    {
    	header("location:../?page=registration&error=1");
    }
    else
    {
    	if($act->register($pin, $fname, $lname, $title, $citizenship, $gender, $comment))
    	{
    		header("location:../?page=registration&success=1");
    	}
    	
    }

}


