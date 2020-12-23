<?php
	include './db.php';
	include './func.php';

	session_start();

	$id = $_POST['id'];
	$password = $_POST['pwd'];
	$check = "SELECT * FROM capstone_member WHERE id = '$id'";
    $result = mq($check);
    // mq로도 해보기

	if(!empty($result) && $result->num_rows == 1){
		// $row = $result->fetch_array(3); #1 is MYSQLI_NUM(123이렇게) 2 is equivalent to MYSQLI_ASSOC(문자형) 3 is MYSQLI_BOTH(둘다)
		test($result->fetch_array(3));
		if($row['pwd']==$password){
			$_SESSION['userid'] = $id;
			if(isset($_SESSION['userid'])){
				echo "Successfully signed in";
				header("Location: ./home.php");
			}
			else{
				echo "Error to save session variable";
				header("location: ./index.php");
			}
		}
		else{
			echo "Wrong password or id";
			header("location: ./index.php");
		}
	}
	else{
		echo "Wrong password or id";
		header("location: ./index.php");
	}


?>