<?php
	include './db.php';
	include './func.php';

	session_start();
	if(isset($_SESSION['userid'] )){
		unset($_SESSION['userid']);
		session_destroy();
		header("location: ./index.php");
		exit();
	}
	else{
		echo "error occured";
	}
?>